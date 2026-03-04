<?php

namespace App\Services;

use App\Interfaces\Services\EmailServiceInterface;
use App\Repositories\EmailRepository;
use App\Services\Base\BaseService;

class EmailService extends BaseService implements EmailServiceInterface{
    public function __construct(public EmailRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}