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

class DictionaryRepository implements DictionaryRepositoryInterface{
    use ReadHelper, UpdateHelper, DeleteHelper, FindHelper, CreateHelper;
    public function __construct(public Dictionary $model, public DictionaryTranslation $translationModel, public LanguageService $languageService)
    {
        $this->translationRelationField = "dictionary_id";
    }
   
}