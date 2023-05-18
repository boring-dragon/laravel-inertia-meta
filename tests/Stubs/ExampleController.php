<?php

declare(strict_types=1);

namespace BoringDragon\LaravelInertiaMeta\Tests\Stubs;

use BoringDragon\LaravelInertiaMeta\Attributes\Page;
use Inertia\Inertia;
use Inertia\Response;

class ExampleController
{
    #[Page(
        title: 'Welcome',
        description: 'This is the welcome page'
    )]
    public function index(): Response
    {
        return Inertia::render('Pages/Welcome')->withPageMeta();
    }
}
