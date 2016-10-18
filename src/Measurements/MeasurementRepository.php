<?php

namespace Delta\DeltaService\Measurements;

use DateTime;
use Delta\DeltaService\AbstractRepository;

class MeasurementRepository extends AbstractRepository implements MeasurementRepositoryInterface
{
    protected $model = MeasurementModel::class;

    /**
     * Find all measurements
     *
     * @param $deviceEui
     * @return mixed
     */
    public function findAll($deviceEui)
    {
        return $this->createModel()->whereHas('sensor', function ($query) use ($deviceEui) {
            $query->whereHas('device', function ($query) use ($deviceEui) {
                $query->where('eui', '=', $deviceEui);
            });
        })->get();
    }

    /**
     * Find a specific measurement
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->createModel()->findOrFail($id);
    }

    /**
     * Store a measurement.
     * @param $data
     */
    public function store($data)
    {
        //TODO gegevens opslaan kan op het moment door elke gebruiker voor elke tabel gedaan worden, ongeacht of het item daarin aan hun toebehoord. (in andere woorden; er is authenticatie, maar geen authorizatie)

        $model = $this->createModel();
        $model->setAttribute('sensor_id', $data['sensor_id']);
        $model->setAttribute('value', $data['value']);
        $model->save();
    }

    /**
     * Delete a measurement
     *
     * @param $id
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->createModel()->findOrFail($id)->delete();
    }

    /**
     * Soft-delete all measurements that are older then the given date
     * @param DateTime $date
     */
    public function removeOlderThan(DateTime $date)
    {
        \DB::table('measurement')->where('created_at', '<', $date->format('Y-m-d H:i:s'))->delete();
    }
}
