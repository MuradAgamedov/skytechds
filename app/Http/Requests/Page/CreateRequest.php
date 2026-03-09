<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Language;

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
        $languages = Language::orderBy("order")->where("status", true)->get();

        $rules = [
            "status" => ["required", "boolean"],
            "order" => ["integer", "nullable"],
            "slug" => ["required", "string", "max:255", "unique:pages,slug"],
            "translations" => ["required", "array"],
            "translations.title" => ["required", "array"],
            "translations.seo_title" => ["required", "array"],
            "translations.seo_description" => ["required", "array"],
            "translations.seo_keywords" => ["required", "array"],
        ];

        foreach($languages as $language) {
            $rules["translations.title.{$language->id}"] = ["required"];
            $rules["translations.seo_title.{$language->id}"] = ["required"];
            $rules["translations.seo_description.{$language->id}"] = ["required"];
            $rules["translations.seo_keywords.{$language->id}"] = ["required"];
        }

        return $rules;
    }
}
