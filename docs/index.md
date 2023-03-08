NovaUnit is a unit-testing package for Laravel Nova, built using PHPUnit. NovaUnit provides you with assertions for Nova Actions, Filters, Lenses and Resources, so you can create great administration panels with confidence.

## Installation

You can install this package into your Laravel project via composer:

```sh
composer require --dev joshgaber/novaunit
```

### Requirements

* PHP 7.2 or higher
* [Laravel](https://laravel.com/) 6.x - 10.x
* [Laravel Nova](https://nova.laravel.com/) 2.x - 4.x
* [PHPUnit](https://github.com/sebastianbergmann/phpunit) 8.x - 10.x

## Usage

NovaUnit can be used to perform assertions on Actions, Filters, Lenses and Resources.

To access the test classes, import and use the base test traits:

```php
class ClearLogsTest extends TestCase {
    use NovaActionTest;
}
```

Currently, there are four traits: `NovaActionTest`, `NovaFilterTest`, `NovaLensTest` and `NovaResourceTest`. To test these components, invoke the respective test class (ie. `novaAction` for Actions).

Once you've created the mock with the initial test class, you can begin testing different aspect of the component:

```php
$this->novaAction(ClearLogs::class)
    ->assertHasField('since_date');
```

## Available Methods

* [Action Methods](actions.md)
* [Field Methods](fields.md)
* [Filter Methods](filters.md)
* [Lens Methods](lenses.md)
* [Resource Methods](resources.md)
