<?php

namespace Delta\DeltaService;


use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    protected $model = "";

    /**
     * @return Model
     */
    public function createModel() {
        $model = $this->model;
        return new $model();
    }

/** Adds the value at the given key from the array into the given model, if the key exists
*
* @param $key
* @param $array
* @param $model
*/
    protected function addIfExists($key, $array, $model)
    {
        if(array_key_exists($key, $array))
        {
            if($key == "alias")
            {
                dd($key, $array, $model);
            }
            $model->setAttribute($key, $array[$key]);
        }
    }
}