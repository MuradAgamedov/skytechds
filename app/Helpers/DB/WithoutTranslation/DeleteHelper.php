<?php

namespace App\Helpers\DB\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;


trait DeleteHelper
{

    
    public function destroy($model)
    {
        $model->delete();
        return $model;
    }

  
}
