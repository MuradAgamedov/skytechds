<?php

namespace App\Helpers\DB\Services;

trait CreateTrait {
    public function store(array $data) {
        
        return $this->repository->store($data);
    }
}