<?php

namespace Delta\DeltaService\Devices;

use Delta\DeltaService\AbstractRepository;

class DeviceRepository extends AbstractRepository implements DeviceRepositoryInterface
{
    protected $model = DeviceModel::class;
}