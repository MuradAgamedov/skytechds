<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FaqRepositoryInterface;
use App\Models\Faq\Faq;
use App\Models\Faq\FaqTranslation;
use App\Services\LanguageService;
use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;


class FaqRepository implements FaqRepositoryInterface
{
    use ReadHelper, UpdateHelper, DeleteHelper, FindHelper, CreateHelper;
    public function __construct(public Faq $model, public FaqTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "faq_id";
    }
  
}
