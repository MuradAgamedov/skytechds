<?php

namespace App\Helpers\DB\WithTranslation;


trait FindHelper 
{
    public function find($id)
    {
        $model = $this->model::findOrFail($id);
        $model->load("translations");
        return $model;
    }
}
