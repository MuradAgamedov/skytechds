<?php

namespace App\Helpers\DB\Services;

trait DeleteTrait {
    public function destroy($address)  {
        return $this->repository->destroy($address);
    }

}