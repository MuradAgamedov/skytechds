<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ServicesRepositoryInterface;
use App\Models\Services\Service;
use App\Models\Services\ServiceTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;

class ServiceRepository implements ServicesRepositoryInterface
{
    use CreateHelper, UpdateHelper, ReadHelper, FindHelper, DeleteHelper;
 
    public function __construct(public Service $model, public ServiceTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {
        $this->folderName = "services";
        $this->translationRelationField = "service_id";
    }
    
}
