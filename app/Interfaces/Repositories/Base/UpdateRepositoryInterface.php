<?php

namespace App\Interfaces\Repositories\Base;


interface UpdateRepositoryInterface {
    public function update($model, array $data);
}