<?php

namespace Delta\DeltaService\Devices;

use Delta\DeltaService\AbstractRepository;

class DeviceRepository extends AbstractRepository implements DeviceRepositoryInterface
{
    protected $model = DeviceModel::class;

    public function findAll() {
        return $this->createModel()->all();
    }

    public function findById($id) {
        return $this->createModel()->where('id', $id)->get();
    }
}
