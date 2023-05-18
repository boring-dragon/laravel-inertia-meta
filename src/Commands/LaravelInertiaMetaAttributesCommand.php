<?php

namespace BoringDragon\LaravelInertiaMetaAttributes\Commands;

use Illuminate\Console\Command;

class LaravelInertiaMetaAttributesCommand extends Command
{
    public $signature = 'laravel-inertia-meta-attributes';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
