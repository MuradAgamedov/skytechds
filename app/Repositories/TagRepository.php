<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Models\Tag\Tag;
use App\Models\Tag\TagTranslation;
use App\Services\LanguageService;

class TagRepository implements AddressRepositoryInterface
{
    use CreateHelper, ReadHelper, UpdateHelper, DeleteHelper, FindHelper;

    public function __construct(public Tag $model, public TagTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "tag_id";
    }
}
