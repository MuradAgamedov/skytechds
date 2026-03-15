<?php

namespace App\Repositories;

use App\Interfaces\Repositories\DictionaryRepositoryInterface;

use App\Models\Dictionary\Dictionary;
use App\Models\Dictionary\DictionaryTranslation;
use App\Services\LanguageService;
use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;

class DictionaryRepository extends BaseCrudRepository implements DictionaryRepositoryInterface{
    public function __construct(Dictionary $model, DictionaryTranslation $translationModel, LanguageService $languageService)
    {
        $this->model = $model;
        $this->translationRelationField = "dictionary_id";
    }



}
