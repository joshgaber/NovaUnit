# NovaUnit

NovaUnit is a unit-testing package for Laravel Nova, built using PHPUnit.

## Installation

You can install the package via composer:

```sh
composer require joshgaber/novaunit
```

## Usage

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
