<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TagRepositoryInterface;
use App\Models\Tag\Tag;
use App\Models\Tag\TagTranslation;
use App\Services\LanguageService;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;

class TagRepository extends BaseCrudRepository implements TagRepositoryInterface
{
    public function __construct(Tag $model, TagTranslation $translationModel, LanguageService $languageService) {
        $this->model = $model;
        $this->translationRelationField = "tag_id";
    }
}
