<?php

namespace Delta\DeltaService;

use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    protected $connection = 'delta_service';
}