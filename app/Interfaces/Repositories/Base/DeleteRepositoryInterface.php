<?php

namespace App\Interfaces\Repositories\Base;


interface DeleteRepositoryInterface {
    public function destroy($model);
}