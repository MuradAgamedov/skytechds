<?php

namespace App\Http\Resources\Blog;

use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "translations" => BlogResourceTranslation::collection(
                $this->whenLoaded("translations")
            ),
            "tags" => TagResource::collection(
                $this->whenLoaded("tags")
            ),
            "slug" => $this->slug,
            "card_image" => $this->card_image,
            "status" => $this->status,
            "blog_category_id" => $this->blog_category_id,
        ];
    }
}
