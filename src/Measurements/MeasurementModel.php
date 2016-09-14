<?php

namespace Delta\DeltaService\Measurements;

use Delta\DeltaService\AbstractModel;

class MeasurementModel extends AbstractModel  implements MeasurementModelInterface
{
    protected $table = 'sensor_data';
    protected $dates = ['created_at'];
    public $timestamps = true;

    protected $test = 'basic string';

    public function getTest()
    {
        return $this->test;
    }

    public function sensor()
    {
        return $this->belongsTo('Delta\DeltaService\Measurements\MeasurementModel', 'sensor_id', 'id');
    }
}
