<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Models\Address\Address;
use App\Models\Address\AddressTranslation;
use App\Services\LanguageService;

class AddressRepository implements AddressRepositoryInterface
{
    use CreateHelper, ReadHelper, UpdateHelper, DeleteHelper, FindHelper;

    public function __construct(public Address $model, public AddressTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "address_id";
    }
  
   


  
   
}
