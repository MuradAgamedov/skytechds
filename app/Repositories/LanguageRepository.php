<?php

namespace App\Repositories;

use App\Helpers\DB\WithoutTranslation\CreateHelper;
use App\Helpers\DB\WithoutTranslation\DeleteHelper;
use App\Helpers\DB\WithoutTranslation\FindHelper;
use App\Helpers\DB\WithoutTranslation\ReadHelper;
use App\Helpers\DB\WithoutTranslation\UpdateHelper;
use App\Models\Language;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\Repositories\LanguageRepositoryInterface;


class LanguageRepository implements LanguageRepositoryInterface
{
    use CreateHelper, UpdateHelper, DeleteHelper, FindHelper, ReadHelper;
    public function __construct(public Language $model) {}
 
  
}
