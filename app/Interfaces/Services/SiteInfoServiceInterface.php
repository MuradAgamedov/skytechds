<?php

namespace App\Interfaces\Services;

use App\Interfaces\Services\Base\FirstServiceInterface;
use App\Interfaces\Services\Base\UpdateServiceInterface;
use App\Models\SiteInfo\SiteInfo;

interface SiteInfoServiceInterface extends FirstServiceInterface, UpdateServiceInterface {
  
}