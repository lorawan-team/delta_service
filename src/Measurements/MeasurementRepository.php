<?php

namespace Delta\DeltaService\Measurements;

use Delta\DeltaService\AbstractRepository;
use DateTime;

class MeasurementRepository extends AbstractRepository implements MeasurementRepositoryInterface
{
    protected $model = MeasurementModel::class;

    /**
     * Find all measurements
     *
     * @param $deviceId
     * @return mixed
     */
    public function findAll($deviceId) {
        return $this->createModel()->whereHas('sensor', function($query) use($deviceId){
            $query->where('device_id', '=', $deviceId);
        })->get();
    }

    /**
     * Find a specific measurement
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return $this->createModel()->findOrFail($id);
    }

    /**
     * Store a measurement.
     * @param $data
     */
    public function store($data)
    {
        $model = $this->createModel();
        $model->setAttribute('sensor_id', $data['sensor_id']);
        $model->setAttribute('value', $data['value']);
        $model->save();
    }

    /**
     * Delete a measurement
     *
     * @param $id
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->createModel()->findOrFail($id)->delete();
    }

    /**
     * Soft-delete all measurements that are older then the given date
     * @param DateTime $date
     */
    public function removeOlderThan(DateTime $date) {
        \DB::table('measurement')->where('created_at', '<', $date->format('Y-m-d H:i:s'))->delete();
    }
}
