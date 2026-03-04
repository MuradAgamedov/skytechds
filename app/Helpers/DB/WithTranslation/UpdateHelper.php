<?php

namespace App\Helpers\DB\WithTranslation;

use App\Helpers\FileClassifierServiceHelper;
use Illuminate\Support\Facades\DB;

trait UpdateHelper 
{
    use FileClassifierServiceHelper;
    public $translationRelationField;
    public $folderName;

    public function update($model, array $data)
    {
        return DB::transaction(function () use ($model, $data) {
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
            $model->refresh();

            return $model->load("translations");
        });
    }
}
