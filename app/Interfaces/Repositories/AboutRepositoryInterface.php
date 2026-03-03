<?php

namespace App\Interfaces\Repositories;

use App\Models\About\About;

interface AboutRepositoryInterface {
    public function update(About $about, array $data):About;
    public function first():About;
}