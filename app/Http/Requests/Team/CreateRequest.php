<?php

namespace App\Http\Requests\Team;

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
            "order" => ["nullable", "integer"],
            "image" => ["required", "image", "mimes:jpeg,png,jpg,gif,svg,webp", "max:2048"],
            "translations" => ["required", "array"],
            "translations.name" => ["required", "array"],
            "translations.position" => ["required", "array"],   

        ];

        foreach($languages as $language) {
            $rules["translations.name.".$language->id] = ["required"];
            $rules["translations.position.".$language->id] = ["required"];
        }

        return $rules;
    }
}
