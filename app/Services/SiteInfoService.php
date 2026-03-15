<?php

namespace App\Services;

use App\Interfaces\Services\SiteInfoServiceInterface;
use App\Models\SiteInfo\SiteInfo;
use App\Repositories\SiteInfoRepository;
use App\Helpers\DB\Services\FirstTrait;
use App\Helpers\DB\Services\UpdateTrait;

class SiteInfoService implements SiteInfoServiceInterface {
    use FirstTrait, UpdateTrait;
    public function __construct(public SiteInfoRepository $repository)
    {
    }

    public function getModel(): SiteInfo
    {
        return $this->repository->getModel();
    }
}