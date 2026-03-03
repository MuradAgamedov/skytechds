<?php

namespace App\Http\Requests\Faq;

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
        $languages = Language::orderBy("orders")->where("status", true)->get();

        $rules = [
            "status" => ["required", "boolean"],
            "order" => ["integer", "boolean"],
            "translations" => ["required", "array"],
            "translations.question" => ["required", "array"],
            "translations.answer" => ["required", "array"],
        ];

        foreach($languages as $language) {
            $rules["translations.answer.{$language->id}"] = ["required"];
            $rules["translations.question.{$language->id}"] = ["required"];

        }

        return $rules;
    }
}
