NovaUnit is a unit-testing package for Laravel Nova, built using PHPUnit. NovaUnit provides you with assertions for Nova Actions, Lenses and Resources, so you can create great administration panels with confidence.

## Installation

You can install this package into your Laravel project via composer:

```sh
composer require --dev joshgaber/novaunit
```

### Requirements

* PHP 7.2 or higher
* [Laravel](https://laravel.com/) 6.x - 7.x
* [Laravel Nova](https://nova.laravel.com/) 2.x - 3.x
* [PHPUnit](https://github.com/sebastianbergmann/phpunit) 8.x - 9.x

## Usage

NovaUnit can be used to perform assertions on Actions, Lenses and Resources.

To access the test classes, import and use the base test traits:

```php
class ClearLogsTest extends TestCase {
    use NovaActionTest;
}
```

Currently, there are three traits: `NovaActionTest`, `NovaLensTest` and `NovaResourceTest`. To test these components, invoke the respective test class (ie. `novaAction` for Actions).

Once you've created the mock with the initial test class, you can begin testing different aspect of the component:

```php
$this->novaAction(ClearLogs::class)
    ->assertHasField('since_date');
```

To see a full list of methods available, [click here](methods.md).
