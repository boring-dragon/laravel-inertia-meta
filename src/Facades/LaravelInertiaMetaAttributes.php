<?php

namespace BoringDragon\LaravelInertiaMetaAttributes\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BoringDragon\LaravelInertiaMetaAttributes\LaravelInertiaMetaAttributes
 */
class LaravelInertiaMetaAttributes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \BoringDragon\LaravelInertiaMetaAttributes\LaravelInertiaMetaAttributes::class;
    }
}
