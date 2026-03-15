<?php

namespace App\Repositories;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\PageRepositoryInterface;
use App\Models\Page\Page;
use App\Models\Page\PageTranslation;
use App\Services\LanguageService;

class PageRepository extends BaseCrudRepository implements PageRepositoryInterface
{

    public function __construct(Page $model, public PageTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "page_id";
        $this->model = $model;
    }
}
