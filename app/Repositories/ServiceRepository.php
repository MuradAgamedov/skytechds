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
            $serviceTranslationData = $data["translations"];
            unset($data["translations"]);
            $data["icon"] = $this->image_service->upload($data, "icon", "services");
            $data["inner_image"] = $this->image_service->upload($data, "inner_image", "blogs");

            $service = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $serviceTranslationData["title"][$language->id] ?? null,
                    "card_title" => $serviceTranslationData["card_title"][$language->id] ?? null,
                    "icon_alt_text" => $serviceTranslationData["icon_alt_text"][$language->id] ?? null,
                    "inner_image_alt_text" => $serviceTranslationData["inner_image_alt_text"][$language->id] ?? null,
                    "description" => $serviceTranslationData["description"][$language->id] ?? null,
                    "seo_title" => $serviceTranslationData["seo_title"][$language->id] ?? null,
                    "seo_description" => $serviceTranslationData["seo_description"][$language->id] ?? null,
                    "seo_keywords" => $serviceTranslationData["seo_keywords"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "service_id" => $service->id
                ]);
            }
            return $service->load("translations");
        });
    }
    public function update(Service $service, array $data): Service
    {
        return DB::transaction(function () use ($service, $data) {
            $serviceTranslationData = $data["translations"];
            unset($data["translations"]);
            $data["icon"] = $this->image_service->update($service, $data, "icon", "services");
            $data["inner_image"] = $this->image_service->update($service, $data, "inner_image", "services");

            $service->update($data);
            $existingTranslations = $service->translations()->get()->keyBy("language_id");

            foreach ($serviceTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $service->refresh();

            return $service->load("translations");
        });
    }

    public function destroy(Service $service): Service
    {
        $service->load("translations");
        $service->delete();
        return $service;
    }
    public function find(Service $service)
    {
        return $service;
    }
}
