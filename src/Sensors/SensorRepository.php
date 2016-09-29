<?php

namespace Delta\DeltaService\Sensors;

use Delta\DeltaService\AbstractRepository;

class SensorRepository extends AbstractRepository implements SensorRepositoryInterface
{
    protected $model = SensorModel::class;

    public function findAll() {
        return $this->createModel()->all();
    }

    public function findById($id) {
        return $this->createModel()->findOrFail($id);
    }
}
