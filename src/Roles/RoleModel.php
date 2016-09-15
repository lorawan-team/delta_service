<?php

namespace Delta\DeltaService\Roles;

use App\User;
use Delta\DeltaService\AbstractModel;

class RoleModel extends AbstractModel  implements RoleModelInterface
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
        return $this->belongsTo('', 'device_id', 'id');
    }
}
