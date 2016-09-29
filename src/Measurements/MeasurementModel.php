<?php

namespace Delta\DeltaService\Measurements;

use Delta\DeltaService\AbstractModel;

class MeasurementModel extends AbstractModel  implements MeasurementModelInterface
{
    protected $table = 'measurement';
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function sensor()
    {
        return $this->belongsTo('Delta\DeltaService\Sensors\SensorModel', 'sensor_id', 'id');
    }
}
