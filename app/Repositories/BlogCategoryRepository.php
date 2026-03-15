<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\BlogCategory\BlogCategoryTranslation;
use App\Services\LanguageService;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
class BlogCategoryRepository extends BaseCrudRepository implements BlogCategoryRepositoryInterface
{
    public function __construct(BlogCategory $model, BlogCategoryTranslation $translationModel, LanguageService $languageService) {
        $this->model = $model;
        $this->translationRelationField = "blog_category_id";
    }



}
