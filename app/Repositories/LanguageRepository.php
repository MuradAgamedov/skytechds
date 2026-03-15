<?php

namespace App\Repositories;

use App\Helpers\DB\WithoutTranslation\CreateHelper;
use App\Helpers\DB\WithoutTranslation\DeleteHelper;
use App\Helpers\DB\WithoutTranslation\FindHelper;
use App\Helpers\DB\WithoutTranslation\ReadHelper;
use App\Helpers\DB\WithoutTranslation\UpdateHelper;
use App\Models\Language;
use App\Interfaces\Repositories\LanguageRepositoryInterface;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;
use Illuminate\Database\Eloquent\Model;


class LanguageRepository extends BaseCrudRepository implements LanguageRepositoryInterface
{
    use CreateHelper, UpdateHelper, DeleteHelper, FindHelper, ReadHelper;
    public function __construct(Language $model) {
        $this->model = $model;
    }


}
