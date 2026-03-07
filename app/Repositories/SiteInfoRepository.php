<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\FirstHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\SiteInfoRepositoryInterface;
use App\Models\SiteInfo\SiteInfo;
use App\Models\SiteInfo\SiteInfoTranslation;
use App\Support\ImageService;

class SiteInfoRepository implements SiteInfoRepositoryInterface
{
    use UpdateHelper, ReadHelper, FirstHelper, FindHelper;
    public function __construct(public SiteInfo  $model, public SiteInfoTranslation $translationModel, public ImageService $image_service) {
        $this->folderName = "site_infos";
        $this->translationRelationField = "site_info_id";
    }

}
