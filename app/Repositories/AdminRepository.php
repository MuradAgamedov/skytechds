<?php
namespace App\Repositories;
use App\Interfaces\Repositories\AdminInterfaceResource;
use App\Models\User;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;

class AdminRepository extends BaseCrudRepository implements AdminInterfaceResource{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        $role = $data['role'] ?? null;
        unset($data['role']);

        $model = $this->model::create($data);

        if ($role) {
            $model->assignRole($role);
        }

        return $model->load('roles');
    }

    public function update($model, array $data)
    {
        $role = $data['role'] ?? null;
        unset($data['role']);

        $model->update($data);

        if ($role) {
            $model->syncRoles($role);
        }

        return $model->load('roles');
    }
}
