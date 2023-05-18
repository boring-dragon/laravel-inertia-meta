<?php

namespace BoringDragon\LaravelInertiaMetaAttributes\Tests;

use BoringDragon\LaravelInertiaMetaAttributes\LaravelInertiaMetaAttributesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'BoringDragon\\LaravelInertiaMetaAttributes\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelInertiaMetaAttributesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-inertia-meta-attributes_table.php.stub';
        $migration->up();
        */
    }
}
