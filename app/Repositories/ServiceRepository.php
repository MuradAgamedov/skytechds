<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ServicesRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\Services\Service;
use App\Models\Services\ServiceTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ServiceRepository implements ServicesRepositoryInterface
{
    public function __construct(public Service $model, public ServiceTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Service
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $data["icon"] = $this->image_service->upload($data, "icon", "services");
            $data["inner_image"] = $this->image_service->upload($data, "inner_image", "blogs");

            $model = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $translationData["title"][$language->id] ?? null,
                    "card_title" => $translationData["card_title"][$language->id] ?? null,
                    "icon_alt_text" => $translationData["icon_alt_text"][$language->id] ?? null,
                    "inner_image_alt_text" => $translationData["inner_image_alt_text"][$language->id] ?? null,
                    "description" => $translationData["description"][$language->id] ?? null,
                    "seo_title" => $translationData["seo_title"][$language->id] ?? null,
                    "seo_description" => $translationData["seo_description"][$language->id] ?? null,
                    "seo_keywords" => $translationData["seo_keywords"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "service_id" => $model->id
                ]);
            }
            return $model->load("translations");
        });
    }
    public function update(Service $model, array $data): Service
    {
        return DB::transaction(function () use ($model, $data) {
            $serviceTranslationData = $data["translations"];
            unset($data["translations"]);
            $data["icon"] = $this->image_service->update($model, $data, "icon", "services");
            $data["inner_image"] = $this->image_service->update($model, $data, "inner_image", "services");

            $model->update($data);
            $existingTranslations = $model->translations()->get()->keyBy("language_id");

            foreach ($serviceTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $model->refresh();

            return $model->load("translations");
        });
    }

    public function destroy(Service $model): Service
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
    public function find(Service $model)
    {
        $model->load("translations");
        return $model;
    }
}
