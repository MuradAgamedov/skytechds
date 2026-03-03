<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FaqRepositoryInterface;
use App\Models\Faq\Faq;
use App\Models\Faq\FaqTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class FaqRepository implements FaqRepositoryInterface
{
    public function __construct(public Faq $model, public FaqTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Faq
    {
        return DB::transaction(function () use ($data) {
            $faqTranslationData = $data["translations"];
            unset($data["translations"]);
            $faq = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {

                $this->translationModel::create([
                    "question" => $faqTranslationData["question"][$language->id] ?? null,
                    "answer" => $faqTranslationData["answer"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "faq_id" => $faq->id
                ]);
            }
            return $faq->load("translations");
        });
    }
    public function update(Faq $faq, array $data): Faq
    {
        return DB::transaction(function () use ($faq, $data) {
            $faqTranslationData = $data["translations"];
            unset($data["translations"]);
            $faq->update($data);
            $existingTranslations = $faq->translations()->get()->keyBy("language_id");

            foreach ($faqTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $faq->refresh();

            return $faq->load("translations");
        });
    }

    public function destroy(Faq $faq): Faq
    {
        $faq->load("translations");
        $faq->delete();
        return $faq;
    }
    public function find(Faq $faq)
    {
        $faq->load("translations");
        return $faq;
    }
}
