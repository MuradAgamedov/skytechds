<?php

namespace App\Repositories;

use App\Interfaces\Repositories\EmailRepositoryInterface;
use App\Models\Email;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;

class EmailRepository extends BaseCrudRepository implements EmailRepositoryInterface{
    public function __construct(Email $model)
    {
        $this->model = $model;
    }
}