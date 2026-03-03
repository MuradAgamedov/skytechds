<?php

namespace App\Interfaces\Services;

use App\Models\SiteInfo\SiteInfo;

interface SiteInfoServiceInterface {
    public function update(SiteInfo $siteInfo, array $data):SiteInfo;
    public function first():SiteInfo;
}