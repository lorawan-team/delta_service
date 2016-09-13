<?php

namespace Delta\DeltaService\Devices;

use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model implements DeviceModelInterface
{
    protected $test = 'basic string';

    public function getTest()
    {
        return $this->test;
    }
}
