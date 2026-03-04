<?php

namespace App\Interfaces\Services\Base;


interface UpdateServiceInterface {
    public function update($model, array $data);
}