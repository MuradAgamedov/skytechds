<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\BlogCategory\BlogCategoryTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function __construct(public BlogCategory $model, public BlogCategoryTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $model = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $translationData["title"][$language->id] ?? null,
                    "seo_title" => $translationData["seo_title"][$language->id] ?? null,
                    "seo_description" => $translationData["seo_description"][$language->id] ?? null,
                    "seo_keywords" => $translationData["seo_keywords"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "blog_category_id" => $model->id
                ]);
            }
            return $model->load("translations");
        });
    }
    public function update($model, array $data)
    {
        return DB::transaction(function () use ($model, $data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
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

    public function destroy($model)
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
    public function find($model)
    {
        $model->load("translations");
        return $model;
    }
}
