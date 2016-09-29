<?php

namespace Delta\DeltaService\Measurements;

use Delta\DeltaService\AbstractRepository;
use DateTime;

class MeasurementRepository extends AbstractRepository implements MeasurementRepositoryInterface
{
    protected $model = MeasurementModel::class;

    public function findAll($deviceId) {
        return $this->createModel()->whereHas('sensor', function($query) use($deviceId){
            $query->where('device_id', '=', $deviceId);
        })->get();
    }

    public function findById($id) {
        return $this->createModel()->where('id', $id)->get();
    }

    public function store($data)
    {
        $model = $this->createModel();
        $model->sensor_id = $data['sensor_id'];
        $model->value = $data['value'];
        $model->save();
    }

    public function deleteById($id)
    {
        return $this->createModel()->where('id', $id)->delete();
    }

    public function removeOlderThan(DateTime $date) {
        \DB::table('measurement')->where('created_at', '<', $date->format('Y-m-d H:i:s'))->delete();
    }
}
