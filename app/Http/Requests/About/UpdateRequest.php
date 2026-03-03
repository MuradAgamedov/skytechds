<?php

namespace App\Http\Requests\About;

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
            "image" => ["nullable", "boolean", "max:2048", "mimes:jpg, jpeg, png"],
            "translations" => ["required", "array"],
            "translations.image_alt_text" => ["required", "array"],
            "translations.text" => ["required", "array"],
        ];

        foreach($languages as $language) {
            $rules["translations.image_alt_text.".$language->id] = ["required"];
            $rules["translations.text.".$language->id] = ["required"];
        }

        return $rules;
    }
}
