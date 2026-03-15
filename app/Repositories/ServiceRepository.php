<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ServicesRepositoryInterface;
use App\Models\Services\Service;
use App\Models\Services\ServiceTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
class ServiceRepository extends BaseCrudRepository implements ServicesRepositoryInterface
{

    public function __construct(Service $model, ServiceTranslation $translationModel, LanguageService $languageService, ImageService $image_service) {
        $this->model = $model;
        $this->translationRelationField = "service_id";
    }

    
}
