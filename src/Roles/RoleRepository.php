<?php

namespace Delta\DeltaService\Roles;

use Delta\DeltaService\AbstractRepository;

class RoleRepository extends AbstractRepository implements RoleRepositoryInterface
{
    protected $model = RoleModel::class;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll() {
        return $this->createModel()->all();
    }

    /**
     * Find a role
     *
     * @param $id
     * @return mixed
     */
    public function findById($id){
        return $this->createModel()->findOrFail($id);
    }

    /**
     * Store a role.
     *
     * @param array $data
     */
    public function store($data) {
        $model = $this->createModel();
        $model->setAttribute('role', $data['role']);
        $model->save();
    }

    /**
     * Update a RoleModel.
     *
     * @param RoleModel $model
     * @param array $data
     */
    public function update($model, $data) {
        $model->setAttribute('role', $data['role']);
        $model->save();
    }

    /**
     * Delete a RoleModel
     *
     * @param $id
     */
    public function deleteById($id) {
        return $this->createModel()->findOrFail($id)->delete();
    }
}
