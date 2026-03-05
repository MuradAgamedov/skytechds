<?php

namespace App\Helpers\DB\Services;

trait FindTrait {
    public function find($id, array $relations = [])  {
        return $this->repository->find($id, $relations);
    }
}