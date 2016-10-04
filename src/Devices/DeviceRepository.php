<?php

namespace Delta\DeltaService\Devices;

use App\User;
use Delta\DeltaService\AbstractRepository;
use Delta\DeltaService\Devices\DeviceModel;

class DeviceRepository extends AbstractRepository implements DeviceRepositoryInterface
{
    protected $model = DeviceModel::class;

    /**
     * Find all devices
     *
     * @param $userId
     * @return mixed
     */
    public function findAll($userId) {

        if(is_null($userId)) {
            // get all devices without users
            $results = $this->createModel()->whereDoesntHave('users')->get();
        } else {

            // get by user id
            $results1 = $this->createModel()->whereHas('users', function($query) use($userId){
                $query->where('device_id', '=', $userId);
            })->get();

            // get all devices without users
            $results2 = $this->createModel()->whereDoesntHave('users')->get();

            $results = $results1->merge($results2);
        }

        return $results;
    }

    /**
     * Find DeviceModel by id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return $this->createModel()->findOrFail($id);
    }

    /**
     * Store a DeviceModel.
     *
     * @param array $data
     */
    public function store($data) {
        $model = $this->createModel();
        $model->setAttribute('name', $data['name']);
        $model->save();
    }

    /**
     * Update a DeviceModel.
     *
     * @param DeviceModel $model
     * @param array $data
     */
    public function update($model, $data) {
        $model->setAttribute('name',$data['name']);
        $model->save();
    }

    /**
     * Delete a device
     *
     * @param int $id
     */
    public function deleteById($id) {
        return $this->createModel()->findOrFail($id)->delete();
    }
}
