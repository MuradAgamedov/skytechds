<?php

namespace App\Services;

use App\Interfaces\Services\AboutServiceInterface;
use App\Interfaces\Services\SiteInfoServiceInterface;
use App\Models\About\About;
use App\Repositories\AboutRepository;

class AboutService implements AboutServiceInterface {
    public function __construct(public AboutRepository $repository)
    {
    }

    public function update(About $about, array $data): About {
        return $this->repository->update($about, $data);
    }

    public function first() : About {
        return $this->repository->first();
    }
}