<?php
namespace App\Repositories;
use App\Interfaces\Repositories\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;

class RoleRepository extends BaseCrudRepository implements RoleRepositoryInterface{
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}