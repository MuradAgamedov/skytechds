<?php

namespace App\Http\Requests\SocialNetwork;

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
        return [
            "platform" => ["required",  "in:facebook,twitter,instagram,linkedIn,youtube,tikTok,reddit,telegram,whatsapp,discord,threads,twitch,wechat"],
            "order" => ["integer"],
            "status" => ["boolean", "nullable"],
            "url" => ["nullable", "url"]
        ];
    }
}
