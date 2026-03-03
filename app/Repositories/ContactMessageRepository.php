<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ContactMessageRepositoryInterface;
use App\Models\ContactMessage;
use App\Repositories\Base\BaseCrudRepository;

class ContactMessageRepository extends BaseCrudRepository implements ContactMessageRepositoryInterface{
    public function __construct(ContactMessage $model)
    {
        $this->model = $model;
    }

    public function toggleRead(ContactMessage $model): ContactMessage {
        $model->read = !$model->read;
        $model->save();
        $model->refresh();
        return $model;
    }

}