<?php

namespace App\Repositories;

use App\Helpers\DB\WithoutTranslation\ReadHelper;
use App\Helpers\DB\WithoutTranslation\UpdateHelper;
use App\Helpers\DB\WithoutTranslation\FindHelper;
use App\Helpers\DB\WithoutTranslation\FirstHelper;

use App\Interfaces\Repositories\AllSeoRepositoryInterface;
use App\Models\AllSeo;


class AllSeoRepository implements AllSeoRepositoryInterface
{
    use ReadHelper, UpdateHelper, FindHelper, FirstHelper;
    public function __construct(public AllSeo $model) {
        $this->folderName = "all_seos";
    }
}
