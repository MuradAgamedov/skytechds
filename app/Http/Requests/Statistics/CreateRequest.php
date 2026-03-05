<?php

namespace App\Http\Requests\Statistics;

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
            "status" => ["required", "boolean"],
            "order" => ["integer", "boolean", "nullable"],
            "icon" => ["image", "nullable", "mimes:jpg,jpeg,png,webp", "max:2048"],
            "translations" => ["required", "array"],
            "translations.icon_alt_text" => ["required", "array"],
            "translations.title" => ["required", "array"],
            "translations.subtitle" => ["required", "array"]
        ];

        foreach($languages as $language) {
            $rules["translations.icon_alt_text.{$language->id}"] = ["required"];
            $rules["translations.title.{$language->id}"] = ["required"];
            $rules["translations.subtitle.{$language->id}"] = ["required"];
        }
        return $rules;
    }
}
