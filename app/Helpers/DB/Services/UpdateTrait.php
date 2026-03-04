<?php

namespace App\Helpers\DB\Services;
trait UpdateTrait {
    public function update($address, array $data) {
        return $this->repository->update($address, $data);
    }
}