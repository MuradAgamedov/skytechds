<?php

namespace App\Helpers\DB\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;


trait DeleteHelper
{
    public function destroy($id)
    {
        $model = $this->find($id);
        $model->delete();
        return $model;
    }
}
