<?php

namespace App\Repositories;

use App\Interfaces\Repositories\StatisticRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\Statistics\Statistic;
use App\Models\Statistics\StatisticTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class StatisticRepository implements StatisticRepositoryInterface
{
    public function __construct(public Statistic $model, public StatisticTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Statistic
    {
        return DB::transaction(function () use ($data) {
            $statisticTranslationData = $data["translations"];
            unset($data["translations"]);
            $statistic = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $statisticTranslationData["title"][$language->id] ?? null,
                    "subtitle" => $statisticTranslationData["subtitle"][$language->id] ?? null,
                    "icon_alt_text" => $statisticTranslationData["icon_alt_text"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "statistic_id" => $statistic->id
                ]);
            }
            return $statistic->load("translations");
        });
    }
    public function update(Statistic $statistic, array $data): Statistic
    {
        return DB::transaction(function () use ($statistic, $data) {
            $statisticTranslationData = $data["translations"];
            unset($data["translations"]);
            $statistic->update($data);
            $existingTranslations = $statistic->translations()->get()->keyBy("language_id");

            foreach ($statisticTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $statistic->refresh();

            return $statistic->load("translations");
        });
    }

    public function destroy(Statistic $statistic): Statistic
    {
        $statistic->load("translations");
        $statistic->delete();
        return $statistic;
    }
    public function find(Statistic $statistic)
    {
        $statistic->load("translations");
        return $statistic;
    }
}
