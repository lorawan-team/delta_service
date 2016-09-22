<?php

namespace Delta\DeltaService\Measurements;

use Delta\DeltaService\AbstractModel;

class MeasurementModel extends AbstractModel  implements MeasurementModelInterface
{
    protected $table = 'measurements';
    protected $dates = ['created_at'];
    public $timestamps = true;

    protected $test = 'basic string';

    public function getTest()
    {
        return $this->test;
    }

    public function sensor()
    {
        return $this->belongsTo('Delta\DeltaService\Sensors\SensorModel', 'sensor_id', 'id');
    }
}
