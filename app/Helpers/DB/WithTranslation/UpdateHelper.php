<?php

namespace App\Helpers\DB\WithTranslation;

use App\Helpers\FileClassifierServiceHelper;
use Illuminate\Support\Facades\DB;

trait UpdateHelper 
{
    use FileClassifierServiceHelper;
    public $translationRelationField;
    public $folderName;

    public function update($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $syncRelations = array_filter(
                $data,
                fn($element, $key) =>
                    is_array($element) &&
                    $key !== "translations" &&
                    method_exists($this->model, $key),
                ARRAY_FILTER_USE_BOTH
            );

            $model = $this->find($id);
            $images = $this->classifier($data)["images"];

            foreach($images as $key => $image) {
                $data[$key] = $this->image_service->update($model, $data, $key, $this->folderName);
            } 

            $translationData = $data["translations"];
            unset($data["translations"]);
            $model->update($data);
            $existingTranslations = $model->translations()->get()->keyBy("language_id");

            foreach ($translationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $relations = ["translations"];

            if (count($syncRelations) > 0) {
                foreach ($syncRelations as $field => $syncRelation) {
                    $model->{$field}()->sync($syncRelation);
                    $relations[] = $field;
                }
            }
            $model->refresh();
            return $model->loadMissing($relations);
        });
    }
}
