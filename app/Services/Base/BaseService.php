<?php

namespace App\Services\Base;

use App\Helpers\DB\Services\CreateTrait;
use App\Helpers\DB\Services\DeleteTrait;
use App\Helpers\DB\Services\FindTrait;
use App\Helpers\DB\Services\ReadTrait;
use App\Helpers\DB\Services\UpdateTrait;

class BaseService {
    use ReadTrait, CreateTrait, UpdateTrait, DeleteTrait, FindTrait;
    public $repository;
}