<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class BlogRepository implements BlogRepositoryInterface
{
    public function __construct(public Blog $model, public BlogTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Blog
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $data["card_image"] = $this->image_service->upload($data, "card_image", "blogs");
            $model = $this->model->create($data);

            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $translationData["title"][$language->id] ?? null,
                    "seo_title" => $translationData["seo_title"][$language->id] ?? null,
                    "seo_description" => $translationData["seo_description"][$language->id] ?? null,
                    "seo_keywords" => $translationData["seo_keywords"][$language->id] ?? null,
                    "description" => $translationData["description"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "blog_id" => $model->id
                ]);
            }
            return $model->load("translations");
        });
    }
    public function update(Blog $model, array $data): Blog
    {
        return DB::transaction(function () use ($model, $data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $data["card_image"] = $this->image_service->update($model, $data, "card_image", "blogs");
            $model->update($data);
            $existingTranslations = $model->translations()->get()->keyBy("language_id");

            foreach ($translationData as $field  => $values) {
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

    public function destroy(Blog $model): Blog
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
    public function find(Blog $model)
    {
        $model->load("translations");
        return $model;
    }
}
