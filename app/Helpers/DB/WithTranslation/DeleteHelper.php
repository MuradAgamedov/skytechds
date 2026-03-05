<?php

namespace App\Helpers\DB\WithTranslation;


trait DeleteHelper 
{
    public function destroy($id)
    {
        $model = $this->find($id);
        $model->loadMissing("translations");
        $model->delete();
        return $model;
    }
}
