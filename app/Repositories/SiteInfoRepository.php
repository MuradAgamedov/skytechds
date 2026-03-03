<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SiteInfoRepositoryInterface;
use App\Models\SiteInfo\SiteInfo;
use App\Models\SiteInfo\SiteInfoTranslation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class SiteInfoRepository implements SiteInfoRepositoryInterface
{
    public function __construct(public SiteInfo $model, public SiteInfoTranslation $translationModel) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
   
    public function update(SiteInfo $siteInfo, array $data): SiteInfo
    {
        return DB::transaction(function () use ($siteInfo, $data) {
            $siteInfoTranslationData = $data["translations"];
            unset($data["translations"]);
            $siteInfo->update($data);
            $existingTranslations = $siteInfo->translations()->get()->keyBy("language_id");

            foreach ($siteInfoTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $siteInfo->refresh();

            return $siteInfo->load("translations");
        });
    }

  
    public function first():SiteInfo
    {
        return $this->model::with("translations")->first();
    }
}
