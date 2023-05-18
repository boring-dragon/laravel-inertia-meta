<?php

namespace BoringDragon\LaravelInertiaMetaAttributes;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BoringDragon\LaravelInertiaMetaAttributes\Commands\LaravelInertiaMetaAttributesCommand;

class LaravelInertiaMetaAttributesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-inertia-meta-attributes')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-inertia-meta-attributes_table')
            ->hasCommand(LaravelInertiaMetaAttributesCommand::class);
    }
}
