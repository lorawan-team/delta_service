<?php

namespace Delta\DeltaService\Providers;

use Delta\DeltaService\Devices\DeviceRepositoryInterface;
use Delta\DeltaService\Example\ExampleRepository;
use Delta\DeltaService\Devices\DeviceRepository;
use App\Providers\AbstractServiceProvider;
use Delta\DeltaService\Example\ExampleRepositoryInterface;

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
    }
}