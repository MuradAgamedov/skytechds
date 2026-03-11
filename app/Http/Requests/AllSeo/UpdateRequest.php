<?php

namespace App\Http\Requests\AllSeo;

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
        return [
            "is_indexed" => ["required", "boolean"],
            "is_followed" => ["required", "boolean"],
            "meta_header" => ["nullable", "string"],
            "meta_footer" => ["nullable", "string"],
        ];
    }
}
