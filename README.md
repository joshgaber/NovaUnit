# NovaUnit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/joshgaber/novaunit.svg?style=flat-square)](https://packagist.org/packages/joshgaber/novaunit)
[![Build Status](https://scrutinizer-ci.com/g/joshgaber/novaunit/badges/build.png)](https://scrutinizer-ci.com/g/joshgaber/novaunit/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/joshgaber/novaunit/badges/coverage.png)](https://scrutinizer-ci.com/g/joshgaber/novaunit/)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/joshgaber/novaunit/badges/quality-score.png)](https://scrutinizer-ci.com/g/joshgaber/novaunit/)
[![StyleCI](https://github.styleci.io/repos/261879333/shield)](https://github.styleci.io/repos/261879333)
[![Total Downloads](https://img.shields.io/packagist/dt/joshgaber/novaunit.svg?style=flat-square)](https://packagist.org/packages/joshgaber/novaunit)

NovaUnit is a unit-testing package for Laravel Nova, built using PHPUnit.

## Installation

You can install the package via composer:

```sh
composer require joshgaber/novaunit
```

## Usage

```php
class ClearLogsTest extends TestCase {
    use NovaActionTest;
}
```

```php
$this->testNovaAction(ClearLogs::class)
    ->assertHasField('since_date');
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email joshgaber@gmail.com instead of using the issue tracker.

## Credits

- [Josh Gaber](https://github.com/joshgaber)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
