<?php

namespace Delta\DeltaService\Measurements;

use Delta\DeltaService\AbstractRepository;
use DateTime;

class MeasurementRepository extends AbstractRepository implements MeasurementRepositoryInterface
{
    protected $model = MeasurementModel::class;

    public function findAll() {
        return $this->createModel()->all();
    }

    public function findById($id) {
        return $this->createModel()->where('id', $id)->get();
    }

    public function removeOlderThan(DateTime $date) {
        \DB::table('measurement')->where('created_at', '<', $date->format('Y-m-d H:i:s'))->delete();
    }
}
