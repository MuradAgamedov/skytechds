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
    
    public function store(array $data)
    {
        $permissions = $data['permissions'] ?? null;
        unset($data['permissions']);
        
        $model = $this->model::create($data);
        
        if ($permissions && is_array($permissions)) {
            $model->givePermissionTo($permissions);
        }
        
        return $model->load('permissions');
    }
    
    public function update($model, array $data)
    {
        $permissions = $data['permissions'] ?? null;
        unset($data['permissions']);
        
        $model->update($data);
        
        if ($permissions !== null && is_array($permissions)) {
            $model->syncPermissions($permissions);
        }
        
        return $model->load('permissions');
    }
}