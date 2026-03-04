<?php

namespace App\Helpers\DB\Services;

trait FindTrait {
    public function find($id)  {
        return $this->repository->find($id);
    }
}