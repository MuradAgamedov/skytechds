<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PortfolioRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\BlogCategory\BlogCategoryTranslation;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PortfolioRepository implements PortfolioRepositoryInterface
{
    public function __construct(public Portfolio $model, public PortfolioTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Portfolio
    {
        return DB::transaction(function () use ($data) {
            $portfolioTranslationData = $data["translations"];
            unset($data["translations"]);
            $portfolio = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $portfolioTranslationData["title"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "portfolio_id" => $portfolio->id
                ]);
            }
            return $portfolio->load("translations");
        });
    }
    public function update(Portfolio $portfolio, array $data): Portfolio
    {
        return DB::transaction(function () use ($portfolio, $data) {
            $portfolioTranslationData = $data["translations"];
            unset($data["translations"]);
            $portfolio->update($data);
            $existingTranslations = $portfolio->translations()->get()->keyBy("language_id");

            foreach ($portfolioTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $portfolio->refresh();

            return $portfolio   ->load("translations");
        });
    }

    public function destroy(Portfolio $portfolio): Portfolio
    {
        $portfolio->load("translations");
        $portfolio->delete();
        return $portfolio;
    }
    public function find(Portfolio $portfolio)
    {
        $portfolio->load("translations");
        return $portfolio;
    }

}
