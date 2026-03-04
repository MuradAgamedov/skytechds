<?php

namespace App\Repositories;

use App\Helpers\DB\WithoutTranslation\CreateHelper;
use App\Helpers\DB\WithoutTranslation\DeleteHelper;
use App\Helpers\DB\WithoutTranslation\FindHelper;
use App\Helpers\DB\WithoutTranslation\ReadHelper;
use App\Interfaces\Repositories\ContactMessageRepositoryInterface;
use App\Models\ContactMessage;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;

class ContactMessageRepository extends BaseCrudRepository implements ContactMessageRepositoryInterface{
    use CreateHelper, ReadHelper, DeleteHelper, FindHelper;
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