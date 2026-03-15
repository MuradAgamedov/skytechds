<?php

namespace App\Repositories;


use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Models\Address\Address;
use App\Models\Address\AddressTranslation;
use App\Services\LanguageService;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
class AddressRepository extends BaseCrudRepository implements AddressRepositoryInterface
{

    public function __construct(Address $model, AddressTranslation $translationModel, LanguageService $languageService) {
        $this->model = $model;
        $this->translationRelationField = "address_id";
    }


}
