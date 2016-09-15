<?php

namespace Delta\DeltaService\Roles;

use Delta\DeltaService\AbstractRepository;

class RoleRepository extends AbstractRepository implements RoleRepositoryInterface
{
    protected $model = MeasurementModel::class;

    public function findAll() {
        return $this->createModel()->all();
    }

    public function findById($id) {
        return $this->createModel()->where('id', $id)->get();
    }
}
