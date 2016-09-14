<?php

namespace Delta\DeltaService\Devices;

use Delta\DeltaService\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeviceModel extends AbstractModel  implements DeviceModelInterface
{
    use SoftDeletes;

    protected $table = 'device';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $timestamps = true;

    protected $test = 'basic string';

    public function getTest()
    {
        return $this->test;
    }

    /**
     * Get the phone record associated with the user.
     */
    public function sensor()
    {
        return $this->hasMany('Delta\DeltaService\Sensors\SensorModel');
    }
}
