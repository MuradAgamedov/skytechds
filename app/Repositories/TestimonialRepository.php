<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TestimonialRepositoryInterface;
use App\Models\Testimonial\Testimonial;
use App\Models\Testimonial\TestimonialTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    use CreateHelper, UpdateHelper, ReadHelper, FindHelper, DeleteHelper;
    public function __construct(public Testimonial  $model, public TestimonialTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {
        $this->folderName = "testimonials";
        $this->translationRelationField = "testimonial_id";
    }
   
}
