<?php

namespace Delta\DeltaService\Roles;

use App\User;
use Delta\DeltaService\AbstractModel;

class RoleModel extends AbstractModel  implements RoleModelInterface
{
    protected $table = 'role';
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;

    protected $test = 'basic string';

    public function getTest()
    {

        return $this->test;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
}
