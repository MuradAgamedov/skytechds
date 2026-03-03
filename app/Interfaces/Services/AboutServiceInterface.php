<?php

namespace App\Interfaces\Services;

use App\Models\About\About;

interface AboutServiceInterface {
    public function update(About $about, array $data):About;
    public function first():About;
}