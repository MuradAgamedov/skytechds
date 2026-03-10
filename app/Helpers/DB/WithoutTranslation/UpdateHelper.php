<?php

namespace App\Helpers\DB\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;


trait UpdateHelper
{
    public function update($model, array $data)
    {
        $syncRelations = array_filter(
            $data,
            fn($element) => is_array($element)
        );

        $model->update($data);

        foreach ($syncRelations as $field => $values) {

            if (!method_exists($model, $field)) {
                continue;
            }

            $relation = $model->{$field}();

            $method = 'sync' . ucfirst($field);

            if (method_exists($model, $method)) {
                $model->$method($values);
            } elseif (method_exists($relation, 'sync')) {
                $relation->sync($values);
            }
        }

        return $model->loadMissing(array_keys($syncRelations));
    }
}
