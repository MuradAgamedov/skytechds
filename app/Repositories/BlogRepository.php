<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class BlogRepository implements BlogRepositoryInterface
{
    public function __construct(public Blog $model, public BlogTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Blog
    {
        return DB::transaction(function () use ($data) {
            $blogTranslationData = $data["translations"];
            unset($data["translations"]);
            $blog = $this->model->create($data);

            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $blogTranslationData["title"][$language->id] ?? null,
                    "seo_title" => $blogTranslationData["seo_title"][$language->id] ?? null,
                    "seo_description" => $blogTranslationData["seo_description"][$language->id] ?? null,
                    "seo_keywords" => $blogTranslationData["seo_keywords"][$language->id] ?? null,
                    "description" => $blogTranslationData["description"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "blog_id" => $blog->id
                ]);
            }
            return $blog->load("translations");
        });
    }
    public function update(Blog $blog, array $data): Blog
    {
        return DB::transaction(function () use ($blog, $data) {
            $blogTranslationData = $data["translations"];
            unset($data["translations"]);
            $blog->update($data);
            $existingTranslations = $blog->translations()->get()->keyBy("language_id");

            foreach ($blogTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $blog->refresh();

            return $blog->load("translations");
        });
    }

    public function destroy(Blog $blog): Blog
    {
        $blog->load("translations");
        $blog->delete();
        return $blog;
    }
    public function find(Blog $blog)
    {
        return $blog;
    }
}
