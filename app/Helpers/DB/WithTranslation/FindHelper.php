<?php

namespace App\Helpers\DB\WithTranslation;


trait FindHelper 
{
    public function find($model)
    {
        $model->load("translations");
        return $model;
    }
}
