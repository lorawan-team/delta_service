<?php

namespace Delta\DeltaService\Sensors;

use App\User;
use Delta\DeltaService\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class SensorModel extends AbstractModel  implements SensorModelInterface
{
    use SoftDeletes;

    protected $table = 'sensor';
    protected $dates = ['created_at', ];
    public $timestamps = true;

    protected $test = 'basic string';

    public function getTest()
    {
        return $this->test;
    }

    public function sensor()
    {
        return $this->belongsTo('Delta\DeltaService\Devices\DeviceModel', 'device_id', 'id');
    }

    public function measurements()
    {
        return $this->hasMany('Delta\DeltaService\Measurements\MeasurementModel', 'sensor_id', 'id');
    }
}
