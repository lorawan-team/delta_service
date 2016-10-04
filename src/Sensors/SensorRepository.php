<?php

namespace Delta\DeltaService\Sensors;

use Delta\DeltaService\AbstractRepository;

class SensorRepository extends AbstractRepository implements SensorRepositoryInterface
{
    protected $model = SensorModel::class;

    /**
     * Get all sensors
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll() {
        return $this->createModel()->all();
    }

    /**
     * Find a specific sensor by ID.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return $this->createModel()->findOrFail($id);
    }

    /**
     * Store a sensor.
     *
     * @param array $data
     */
    public function store($data) {
        $model = $this->createModel();
        $model->setAttribute('name', $data['name']);
        $model->setAttribute('device_id', $data['device_id']);
        $model->save();
    }

    /**
     * Update a SensorModel.
     *
     * @param SensorModel $model
     * @param array $data
     */
    public function update($model, $data) {
        $model->setAttribute('name', $data['name']);
        $model->save();
    }

    /**
     * Delete a SensorModel
     *
     * @param $id
     */
    public function deleteById($id) {
        return $this->createModel()->findOrFail($id)->delete();
    }
}
