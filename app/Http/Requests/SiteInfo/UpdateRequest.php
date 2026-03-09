<?php

namespace App\Http\Requests\SiteInfo;

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
            "header_logo_light_for_mode" => ["nullable", "max:2048", "mimes:jpg,svg,png,jpeg,webp"],
            "header_logo_dark_for_mode" => ["nullable", "max:2048", "mimes:jpg,svg,png,jpeg,webp"],
            "footer_logo_light_for_mode" => ["nullable", "max:2048", "mimes:jpg,svg,png,jpeg,webp"],
            "footer_logo_dark_for_mode" => ["nullable", "max:2048","mimes:jpg,svg,png,jpeg,webp"],
            "favicon" => ["nullable", "max:2048", "mimes:jpg,svg,png,jpeg,webp"],
            "translations" => ["required", "array"],
            "translations.header_logo_light_for_mode_alt_text" => ["required", "array"],
            "translations.header_logo_dark_for_mode_alt_text" => ["required", "array"],
            "translations.footer_logo_light_mode_alt_text" => ["required", "array"],
            "translations.footer_logo_dark_mode_alt_text" => ["required", "array"],

        ];

        foreach($languages as $language) {
            $rules["translations.header_logo_light_for_mode_alt_text.".$language->id] = ["required"];
            $rules["translations.header_logo_dark_for_mode_alt_text.".$language->id] = ["required"];
            $rules["translations.footer_logo_light_mode_alt_text.".$language->id] = ["required"];
            $rules["translations.footer_logo_dark_mode_alt_text.".$language->id] = ["required"];
        }

        return $rules;
    }
}
