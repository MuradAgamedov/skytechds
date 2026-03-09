<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\PageRepositoryInterface;
use App\Models\Page\Page;
use App\Models\Page\PageTranslation;
use App\Services\LanguageService;

class PageRepository implements PageRepositoryInterface
{
    use CreateHelper, ReadHelper, UpdateHelper, DeleteHelper, FindHelper;

    public function __construct(public Page $model, public PageTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "page_id";
    }
}
