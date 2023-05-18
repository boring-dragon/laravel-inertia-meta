<?php

use BoringDragon\LaravelInertiaMeta\Tests\Stubs\ExampleController;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Inertia\Testing\AssertableInertia;

beforeEach(function () {
    Route::middleware([StartSession::class, SubstituteBindings::class])
        ->group(function () {
            Route::get('/', [ExampleController::class, 'index'])->name('home');
        });
});


test('it can render a page with meta attributes', function () {

    $this->withoutExceptionHandling();

    $this->get('/')
    ->assertInertia(function (AssertableInertia $page){
        $page->component('Pages/Welcome');
        $page->has('meta', function (AssertableInertia $page) {
            $page->where('title', 'Welcome');
            $page->where('description', 'This is the welcome page');
        });
    });

});
