<?php

namespace App\Interfaces\Repositories;

use App\Models\SiteInfo\SiteInfo;

interface SiteInfoRepositoryInterface {
    public function update(SiteInfo $siteInfo, array $data):SiteInfo;
    public function first():SiteInfo;
}