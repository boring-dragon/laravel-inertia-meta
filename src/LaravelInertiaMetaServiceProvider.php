<?php

namespace BoringDragon\LaravelInertiaMeta;

use BoringDragon\LaravelInertiaMeta\Attributes\Page;
use Inertia\Response;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Throwable;

class LaravelInertiaMetaServiceProvider extends PackageServiceProvider
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
            ->hasConfigFile();
    }

    public function packageBooted()
    {
        Response::macro('withPageMeta', function (array $meta = []): Response {

            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);

            if (count($trace) < 3) {
                throw new \Exception('withPageMeta must be called inside a controller method');
            }

            $caller = $trace[2];

            $classInstance = app($caller['class']);

            if (! $classInstance) {
                throw new \Exception('cannot find class instance of '.$caller['class']);
            }

            $reflectionClass = new \ReflectionClass($classInstance);

            foreach ($reflectionClass->getMethods() as $method) {

                try {
                    if ($method->getAttributes(Page::class)) {
                        $methodsWithPageAttribute[] = $method;
                    }
                } catch (Throwable) {
                    continue;
                }
            }

            $currentMethod = collect(debug_backtrace())->first(function ($trace) use ($methodsWithPageAttribute) {
                return in_array($trace['function'], collect($methodsWithPageAttribute)->map(function ($method) {
                    return $method->name;
                })->toArray());
            });

            if (! $currentMethod) {
                throw new \Exception('withPageMeta must be called inside a controller method with Page attribute');
            }

            $attribute = collect($reflectionClass->getMethod($currentMethod['function'])
                ->getAttributes(Page::class))
                ->first();

            /** @var Response $this */
            return $this->with([
                'meta' => array_merge([
                    'title' => $attribute->newInstance()->title,
                    'description' => $attribute->newInstance()->description,
                ], $meta),
            ]);
        });
    }
}
