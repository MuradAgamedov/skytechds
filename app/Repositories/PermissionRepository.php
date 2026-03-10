<?php
namespace App\Repositories;
use App\Interfaces\Repositories\PermissionRepositoryInterface;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;
use Spatie\Permission\Models\Permission;
class PermissionRepository extends BaseCrudRepository implements PermissionRepositoryInterface{
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
}