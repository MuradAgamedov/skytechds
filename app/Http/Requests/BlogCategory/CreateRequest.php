<?php

namespace App\Http\Requests\BlogCategory;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            "slug" => ["string", "required", "unique:blog_categories,slug"],
            "translations" => ["required", "array"],
            "translations.title" => ["required", "array"],
            "translations.seo_title" => ["required", "array"],
            "translations.seo_description" => ["required", "array"],
            "translations.seo_keywords" => ["required", "array"],

        ];

        foreach ($languages as $language) {
            $rules["translations.title." . $language->id] = ["required"];
            $rules["translations.seo_title." . $language->id] = ["required"];
            $rules["translations.seo_description." . $language->id] = ["required"];
            $rules["translations.seo_keywords." . $language->id] = ["required"];
        }

        return $rules;
    }
}
