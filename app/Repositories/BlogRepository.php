<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;

class BlogRepository implements BlogRepositoryInterface
{
    use CreateHelper, UpdateHelper, ReadHelper, FindHelper, DeleteHelper;
    public function __construct(public Blog $model, public BlogTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {
        $this->folderName = "blogs";
        $this->translationRelationField = "blog_id";
    }
}
