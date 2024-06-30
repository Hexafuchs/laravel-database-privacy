# Less privacy intrusive database session handler

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hexafuchs/laravel-database-privacy.svg?style=flat-square)](https://packagist.org/packages/hexafuchs/laravel-database-privacy)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hexafuchs/laravel-database-privacy/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hexafuchs/laravel-database-privacy/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/hexafuchs/laravel-database-privacy/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/hexafuchs/laravel-database-privacy/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hexafuchs/laravel-database-privacy.svg?style=flat-square)](https://packagist.org/packages/hexafuchs/laravel-database-privacy)

The default database session handler of Laravel stores the IP and User Agent in the session. This is problematic in 
many ways, as this is data that is unnecessary, not well protected, and not even used anywhere, also leading to issues 
with the GDPR. This database handler is exactly the same as the original one, but removes this unnecessary data.  

## Installation

You can install the package via composer:

```bash
composer require hexafuchs/laravel-database-privacy
```

## Usage

If you want to make sure you get the session table of this package, use the following artisan command:
```bash
php artisan make:privacy-session-table
```

The package also tries to hook into the original command, but you should check your migration file to make sure 
`ìp_address` and `user_agent` are missing.

To check everything is working correctly, you can execute the following command 
(assuming your session handler is the same in the CLI and on the webserver):
```bash
php artisan session:handler
```
It should return `Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\PrivacyFriendlyDatabaseSessionHandler`.

If it does not work, try manually adding the provider to your `bootstrap/providers.php`:
```php
return [
    ...,
    \Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\PrivacyFriendlyDatabaseSessionHandlerServiceProvider::class,
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
