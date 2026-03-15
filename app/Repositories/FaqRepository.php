<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FaqRepositoryInterface;
use App\Models\Faq\Faq;
use App\Models\Faq\FaqTranslation;
use App\Services\LanguageService;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;

class FaqRepository extends BaseCrudRepository implements FaqRepositoryInterface
{
    public function __construct(Faq $model, public FaqTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "faq_id";
        $this->model = $model;
    }
  
}
