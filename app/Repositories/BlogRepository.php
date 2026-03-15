<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;
class BlogRepository extends BaseCrudRepository implements BlogRepositoryInterface
{
    public function __construct(Blog $model, BlogTranslation $translationModel, LanguageService $languageService, ImageService $image_service) {
        $this->model = $model;
    }
}
