<?php

namespace Delta\DeltaService\Providers;

use Delta\DeltaService\Devices\DeviceRepositoryInterface;
use Delta\DeltaService\Example\ExampleRepository;
use Delta\DeltaService\Devices\DeviceRepository;
use App\Providers\AbstractServiceProvider;
use Delta\DeltaService\Example\ExampleRepositoryInterface;
use Delta\DeltaService\Measurements\MeasurementRepositoryInterface;
use Delta\DeltaService\Measurements\MeasurementRepository;
use Delta\DeltaService\Roles\RoleRepository;
use Delta\DeltaService\Roles\RoleRepositoryInterface;
use Delta\DeltaService\Sensors\SensorRepository;
use Delta\DeltaService\Sensors\SensorRepositoryInterface;

class ExampleProvider extends AbstractServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig('delta_service');
        $this->setupMigrations();
        $this->setupConnection('delta_service', 'delta_service.connection');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerClassAliases([
            'example' => ExampleRepositoryInterface::class,
            'device' => DeviceRepositoryInterface::class,
            'measurement' => MeasurementRepositoryInterface::class,
            'role' => RoleRepositoryInterface::class,
            'sensor' => SensorRepositoryInterface::class,
        ]);

        $this->app->singleton('example', function ($app) {
            return new ExampleRepository(
                $app['events']
            );
        });

        $this->app->singleton('device', function ($app) {
            return new DeviceRepository(
                $app['events']
            );
        });

        $this->app->singleton('measurement', function ($app) {
            return new MeasurementRepository(
                $app['events']
            );
        });

        $this->app->singleton('role', function ($app) {
            return new RoleRepository(
                $app['events']
            );
        });

        $this->app->singleton('sensor', function ($app) {
            return new SensorRepository(
                $app['events']
            );
        });
    }
}