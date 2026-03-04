<?php

namespace App\Helpers\DB\Services;

trait FirstTrait {
    public function first()  {
        return $this->repository->first();
    }
}