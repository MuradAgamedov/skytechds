<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\BlogCategory\BlogCategoryTranslation;
use App\Services\LanguageService;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    use ReadHelper, UpdateHelper, DeleteHelper, FindHelper, CreateHelper;
    public function __construct(public BlogCategory $model, public BlogCategoryTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "blog_category_id";
    }
   
 
   
}
