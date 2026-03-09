<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Helpers\DB\WithTranslation\FirstHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Support\ImageService;

use App\Interfaces\Repositories\AboutRepositoryInterface;
use App\Models\About\About;
use App\Models\About\AboutTranslation;


class AboutRepository implements AboutRepositoryInterface
{
    use ReadHelper, UpdateHelper, FirstHelper, FindHelper;
    public function __construct(public About $model, public AboutTranslation $translationModel, public ImageService $image_service) {
        $this->folderName = "abouts";
        $this->translationRelationField = "about_id";
    }
}
