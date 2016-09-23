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
     * @param $data
     * @return mixed
     */
    public function findAll($data) {

        $results = [];

        if(! array_key_exists('user_id', $data)) {
            // get all devices without users
            $results = $this->createModel()->whereDoesntHave('users');
        } else {
            $userId = $data['user_id'];

            // get by user id
            $results1 = $this->createModel()->with(['users' => function ($q) use ($userId){
                    $q->wherePivot('user_id', $userId);
                }])->get();
            // get all devices without users
            $results2 = $this->createModel()->whereDoesntHave('users');

            $results = array_merge($results1->toArray(), $results2->toArray());
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
        return $this->createModel()->where('id', $id)->first();
    }

    /**
     * Store a DeviceModel.
     *
     * @param array $data
     */
    public function store($data) {
        $model = $this->createModel();
        $model->name = $data['name'];
        $model->save();
    }

    /**
     * Update a DeviceModel.
     *
     * @param DeviceModel $device
     * @param array $data
     */
    public function update($device, $data) {
        $device->name = $data['name'];
        $device->save();
    }

    /**
     * Delete a DeviceModel
     *
     * @param DeviceModel $device
     */
    public function delete($device) {
        $device->delete();
    }
}
