<?php

namespace App\Helpers\DB\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;


trait UpdateHelper 
{

    
    public function update($model, array $data) {
        $model->update($data);
        $model->refresh();
        return $model;
    }

  
}
