<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Testimonial\CreateRequest;
use App\Http\Requests\Testimonial\UpdateRequest;
use App\Http\Resources\Testimonial\TestimonialResource;
use App\Services\TestimonialService as ServicesTestimonialService;
use App\Support\Messages\TestimonialMessages;

class TestimonialController extends BaseController
{
    public function __construct(public ServicesTestimonialService $testimonial_service) {
        $this->service = $testimonial_service;
        $this->resource = TestimonialResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = TestimonialMessages::class;
        $this->model = $testimonial_service->getModel();
    }
}
