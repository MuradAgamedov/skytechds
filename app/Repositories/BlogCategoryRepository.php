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
    public function store(array $data): BlogCategory
    {
        return DB::transaction(function () use ($data) {
            $blogCategoryTranslationData = $data["translations"];
            unset($data["translations"]);
            $blogCategory = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $blogCategoryTranslationData["title"][$language->id] ?? null,
                    "seo_title" => $blogCategoryTranslationData["seo_title"][$language->id] ?? null,
                    "seo_description" => $blogCategoryTranslationData["seo_description"][$language->id] ?? null,
                    "seo_keywords" => $blogCategoryTranslationData["seo_keywords"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "blog_category_id" => $blogCategory->id
                ]);
            }
            return $blogCategory->load("translations");
        });
    }
    public function update(BlogCategory $blogCategory, array $data): BlogCategory
    {
        return DB::transaction(function () use ($blogCategory, $data) {
            $blogCategoryTranslationData = $data["translations"];
            unset($data["translations"]);
            $blogCategory->update($data);
            $existingTranslations = $blogCategory->translations()->get()->keyBy("language_id");

            foreach ($blogCategoryTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $blogCategory->refresh();

            return $blogCategory->load("translations");
        });
    }

    public function destroy(BlogCategory $blogCategory): BlogCategory
    {
        $blogCategory->load("translations");
        $blogCategory->delete();
        return $blogCategory;
    }
    public function find(BlogCategory $blogCategory)
    {
        $blogCategory->load("translations");
        return $blogCategory;
    }
}
