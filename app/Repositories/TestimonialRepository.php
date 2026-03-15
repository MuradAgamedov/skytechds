<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TestimonialRepositoryInterface;
use App\Models\Testimonial\Testimonial;
use App\Models\Testimonial\TestimonialTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
class TestimonialRepository extends BaseCrudRepository implements TestimonialRepositoryInterface
{
    public function __construct(Testimonial $model, public TestimonialTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {
        $this->folderName = "testimonials";
        $this->translationRelationField = "testimonial_id";
        $this->model = $model;
    }
   
}
