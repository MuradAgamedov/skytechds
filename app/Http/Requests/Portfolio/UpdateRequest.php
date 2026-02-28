<?php

namespace App\Http\Requests\Portfolio;

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
            "card_image" => ["nullable", "boolean"],
            "url" => ["nullable", "string", "max:255", "url"],
            "translations" => ["required", "array"],
            "translations.title" => ["required", "array"],
        ];

        foreach($languages as $language) {
            $rules["translations.title.".$language->id] = ["required"];
        }

        return $rules;
    }
}
