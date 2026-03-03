<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TestimonialRepositoryInterface;
use App\Models\Testimonial\Testimonial;
use App\Models\Testimonial\TestimonialTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public function __construct(public Testimonial $model, public TestimonialTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Testimonial
    {
        return DB::transaction(function () use ($data) {
            $testimonialTranslationData = $data["translations"];
            unset($data["translations"]);
            $data["photo"] = $this->image_service->upload($data, "photo", "testimonials");
            $testimonial = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "full_name" => $testimonialTranslationData["full_name"][$language->id] ?? null,
                    "company" => $testimonialTranslationData["company"][$language->id] ?? null,
                    "position" => $testimonialTranslationData["position"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "testimonial_id" => $testimonial->id
                ]);
            }
            return $testimonial->load("translations");
        });
    }


    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        return DB::transaction(function () use ($testimonial, $data) {
            $testimonialTranslationData = $data["translations"];
            unset($data["translations"]);
            $data["photo"] = $this->image_service->update($testimonial, $data, "photo", "testimonials");
            $testimonial->update($data);
            $existingTranslations = $testimonial->translations()->get()->keyBy("language_id");

            foreach ($testimonialTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }

            $testimonial->refresh();

            return $testimonial->load("translations");
        });
    }

    public function destroy(Testimonial $testimonial): Testimonial
    {
        $testimonial->load("translations");
        $testimonial->delete();
        return $testimonial;
    }
    public function find(Testimonial $testimonial)
    {
        $testimonial->load("translations");
        return $testimonial;
    }
}
