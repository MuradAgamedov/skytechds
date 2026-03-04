<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\Base\CreateRepositoryInterface;
use App\Interfaces\Repositories\Base\DeleteRepositoryInterface;
use App\Interfaces\Repositories\Base\FindRepositoryInterface;
use App\Interfaces\Repositories\Base\ReadRepositoryInterface;
use App\Models\ContactMessage;

interface ContactMessageRepositoryInterface extends ReadRepositoryInterface, CreateRepositoryInterface, DeleteRepositoryInterface, FindRepositoryInterface{
    public function toggleRead(ContactMessage $model) : ContactMessage;
}