<?php

namespace Delta\DeltaService\Measurements;

use Delta\DeltaService\AbstractRepository;

class MeasurementRepository extends AbstractRepository implements MeasurementRepositoryInterface
{
    protected $model = MeasurementModel::class;

    public function findAll() {
        return $this->createModel()->all();
    }

    public function findById($id) {
        return $this->createModel()->where('id', $id)->get();
    }
}
