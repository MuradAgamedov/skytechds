<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Helpers\DB\WithTranslation\FirstHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Support\ImageService;

use App\Interfaces\Repositories\AllSeoRepositoryInterface;
use App\Models\AllSeo;


class AllSeoRepository implements AllSeoRepositoryInterface
{
    use ReadHelper, UpdateHelper, FirstHelper, FindHelper;
    public function __construct(public AllSeo $model) {
        $this->folderName = "all_seos";
        $this->translationRelationField = "all_seo_id";
    }
}
