<?php

namespace Delta\DeltaService\Providers;

use Delta\DeltaService\ExampleRepository;
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
        //$this->setupConfig('delta_service');
        //$this->setupMigrations();
        //$this->setupConnection('delta_service', 'delta_service.connection');
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
        ]);

        $this->app->singleton('example', function ($app) {
            return new ExampleRepository(
                $app['events']
            );
        });
    }
}