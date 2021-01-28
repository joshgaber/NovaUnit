# Lenses

* [Testing Lenses](#testing-lenses)

## Testing Lenses

To create the testing object for a Nova Lens, add the test trait to your class, and invoke the test method.

```php
class TestClass extends TestCase
{
    use NovaLensTest;

    public function testNovaLens()
    {
        $lens = $this->novaLens(MyLens::class);
    }
}
```

The following assertions can be run on the Nova Lens:

* [Action Tests](actions.md#testing-actions-on-components)
* [Field Tests](fields.md#testing-fields-on-components)
* [Filter Tests](filters.md#testing-filters-on-components)

## Testing Lens Query

```php
$response = $lens->query(User::class);
```

Invokes the `query` method on the lens with the given parameters.

* `$model` - The class path of the model to build the query from

### `assertContains($element)`

```php
$lens->assertContains(User::find(1));
```

Assert that `$element` is returned when this lens query is applied

### `assertMissing($element)`

```php
$lens->assertMissing(User::find(1));
```

Assert that `$element` is not returned when this lens query is applied

### `assertCount($count)`

```php
$lens->assertCount(3);
```

Assert that a specific number of records are returned when this lens query is applied

### `assertWithFilters()`

```php
$lens->assertWithFilters();
```

Assert that the provided filter values will be applied to this query (ie., the response will be wrapped in `$request->withFilters()`)

### `assertWithOrdering()`

```php
$lens->assertWithOrdering();
```

Assert that the provided ordering rules will be applied to this query (ie., the response will be wrapped in `$request->withOrdering()`)
