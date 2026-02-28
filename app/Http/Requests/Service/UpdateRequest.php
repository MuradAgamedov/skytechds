<?php

namespace App\Http\Requests\Service;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {
        $languages = Language::where("status", true)->orderBy("order")->get();
        $rules = [
            "status" => ["nullable", "boolean"],
            "order" => ["integer", "nullable"],
            "slug" => ["string", "required", "unique:services,slug," . $this->route("service")->id],
            "icon" => ["image", "required", "mimes:jpg,jpeg,png,webp", "max:2048"],
            "inner_image" => ["image", "required", "mimes:jpg,jpeg,png,webp", "max:2048"],
            "translations" => ["required", "array"],
            "translations.title" => ["required", "array"],
            "translations.card_title" => ["required", "array"],
            "translations.icon_alt_text" => ["required", "array"],
            "translations.inner_image_alt_text" => ["required", "array"],
            "translations.seo_title" => ["required", "array"],
            "translations.seo_description" => ["required", "array"],
            "translations.seo_keywords" => ["required", "array"],
            "translations.description" => ["required", "array"],
        ];

        foreach ($languages as $language) {
            $rules["translations.title." . $language->id] = ["required"];
            $rules["translations.seo_title." . $language->id] = ["required"];
            $rules["translations.seo_description." . $language->id] = ["required"];
            $rules["translations.seo_keywords." . $language->id] = ["required"];
            $rules["translations.description." . $language->id] = ["required"];
            $rules["translations.card_title." . $language->id] = ["required"];
            $rules["translations.icon_alt_text." . $language->id] = ["required"];
            $rules["translations.inner_image_alt_text." . $language->id] = ["required"];
        }

        return $rules;
    }
}
