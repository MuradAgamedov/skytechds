<?php

namespace App\Services;

use App\Interfaces\Services\SiteInfoServiceInterface;
use App\Models\SiteInfo\SiteInfo;
use App\Repositories\SiteInfoRepository;

class SiteInfoService implements SiteInfoServiceInterface {
    public function __construct(public SiteInfoRepository $repository)
    {
    }

    public function update($siteInfo, array $data) {
        return $this->repository->update($siteInfo, $data);
    }

    public function first()  {
        return $this->repository->first();
    }
}