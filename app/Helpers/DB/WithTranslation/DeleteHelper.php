<?php

namespace App\Helpers\DB\WithTranslation;


trait DeleteHelper 
{
    public function destroy($model)
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
}
