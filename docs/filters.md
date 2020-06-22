# Filters

* [Testing Filters](#testing-filters)
* [Testing Applying Filter](#testing-applying-filter)
* [Testing Filters on Components](#testing-filters-on-components)

## Testing Filters

To create the testing object for a Nova Filter, add the `NovaFilterTest` trait to your class, and invoke the test method.

```php
class TestClass extends TestCase
{
    use NovaFilterTest;

    public function testNovaFilter()
    {
        $filter = $this->novaFilter(MyFilter::class);
    }
}
```

The following assertions can be run on the Nova Filter:

### `assertSelectFilter()`

```php
$filter->assertSelectFilter();
```

Assert that the filter is a Select Filter

### `assertBooleanFilter()`

```php
$filter->assertBooleanFilter();
```

Assert that the filter is a Boolean Filter

### `assertDateFilter()`

```php
$filter->assertDateFilter();
```

Assert that the filter is a Date Filter

### `assertHasOption($option)`

```php
$filter->assertHasOption('is_admin');
```

Assert that the filter has an option with a key or value that matches `$option`

### `assertOptionMissing($option)`

```php
$filter->assertOptionMissing('is_admin');
```

Assert that the filter does not have an option with a key or value that matches `$option`

## Testing Applying Filter

```php
$response = $filter->apply(User::class, 'is_admin');
```

Invokes the `apply` method on the filter with the given parameters.

* `$model` - The class path of the model to build the query from
* `$value` - The value that would be passed by the user to the filter. The format of this value varies depending on the type of filter:
    * *Select Filter*: a single mixed value, generally a string
    * *Boolean Filter*: an array of keys with boolean values
    * *Date Filter*: a date, or a stringable Date object

### `assertContains($element)`

```php
$response->assertContains(User::find(1));
```

Assert that `$element` is returned when this filter is applied

### `assertMissing($element)`

```php
$response->assertMissing(User::find(1));
```

Assert that `$element` is not returned when this filter is applied

### `assertCount($count)`

```php
$response->assertCount(3);
```

Assert that a specific number of records are returned when this filter is applied

## Testing Filters on Components

Filter assertions can be run on the following Nova classes:

* [Lenses](lenses.html#testing-lenses)
* [Resources](resources.html#testing-resources)

### `assertHasFilter($filter)`

```php
$component->assertHasFilter(MyFilter::class);
```

Asserts that the provided class path `$filter` matches one of the filters returned by the `filters()` method

### `assertFilterMissing($filter)`

```php
$component->assertFilterMissing(MyFilter::class);
```

Asserts that the provided class path `$filter` does not match any filters returned by the `filters()` method

### `assertHasNoFilters()`

```php
$component->assertHasNoFilters();
```

Asserts that the `filters()` method returns an empty array.

### `assertHasValidFilters()`

```php
$component->assertHasValidFilters();
```

Asserts that all values returned by the `filters()` method are valid Nova Filters.
