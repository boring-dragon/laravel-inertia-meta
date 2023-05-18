# Laravel Inertia Meta Attributes


## Installation

You can install the package via composer:

```bash
composer require boring-dragon/laravel-inertia-meta-attributes
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-inertia-meta-attributes-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-inertia-meta-attributes-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-inertia-meta-attributes-views"
```

## Usage

```php
$laravelInertiaMetaAttributes = new BoringDragon\LaravelInertiaMetaAttributes();
echo $laravelInertiaMetaAttributes->echoPhrase('Hello, BoringDragon!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohamed jinas](https://github.com/boring-dragon)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
