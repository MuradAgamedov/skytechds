<?php

namespace App\Http\Requests\Testimonial;

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
            "status" => ["required", "boolean"],
            "order" => ["integer", "boolean", "nullable"],
            "photo" => ["image", "required", "mimes:jpg,jpeg,png,webp", "max:2048"],
            "translations" => ["required", "array"],
            "translations.full_name" => ["required", "array"],
            "translations.position" => ["required", "array"],
            "translations.company" => ["required", "array"]
        ];

        foreach($languages as $language) {
            $rules["translations.position.{$language->id}"] = ["required"];
            $rules["translations.full_name.{$language->id}"] = ["required"];
            $rules["translations.company.{$language->id}"] = ["required"];
        }
        return $rules;
    }
}
