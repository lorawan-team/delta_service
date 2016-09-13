<?php

namespace Delta\DeltaService\Example;

use Illuminate\Database\Eloquent\Model;

class ExampleModel extends Model implements ExampleModelInterface
{
    protected $test = 'basic string';

    public function getTest()
    {
        return $this->test;
    }


}
