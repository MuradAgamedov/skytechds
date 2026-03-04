<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SiteInfoRepositoryInterface;
use App\Models\SiteInfo\SiteInfo;
use App\Models\SiteInfo\SiteInfoTranslation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class SiteInfoRepository implements SiteInfoRepositoryInterface
{
    public function __construct(public SiteInfo  $model, public SiteInfoTranslation $translationModel) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
   
    public function update( $model, array $data)
    {
        return DB::transaction(function () use ($model, $data) {
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

  
    public function first():SiteInfo
    {
        return $this->model::with("translations")->first();
    }
}
