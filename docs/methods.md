# Available Methods

Below is a list of assertions and other methods that can be performed on each Nova component. All methods are instance methods, invoked directly on the object testing class.

* [Actions](#actions)
* [Lenses](#lenses)
* [Resources](#resources)
* [Shared Assertions](#shared-assertions)
  * [Action Assertions](#action-assertions)
  * [Field Assertions](#field-assertions)

## Actions

To create the testing object for a Nova Action, add the test trait to your class, and invoke the test method.

```php
class TestClass extends TestCase
{
    use \NovaUnit\Actions\NovaActionTest;

    public function testNovaAction()
    {
        $action = $this->novaAction(MyAction::class);
    }
}
```

All methods used for asserting [fields](#field-assertions) can be used on Nova Actions, as well as the following:

```php
$action->handle($fields, $models);
```

Invokes the `handle` method on the action with the given parameters.

* `$fields` - A key-value array with the input values of the action fields, indexed by attribute. Eg., `['name' => 'John Smith']`
* `$models` - A list of the models to apply the action to. Value can be either an array, an Eloquent collection, or a single Model. 

## Lenses

To create the testing object for a Nova Lens, add the test trait to your class, and invoke the test method.

```php
class TestClass extends TestCase
{
    use \NovaUnit\Actions\NovaLensTest;

    public function testNovaLens()
    {
        $lens = $this->novaLens(MyLens::class);
    }
}
```

All methods used for asserting [fields](#field-assertions) can be used on Nova Actions, as well as the following:

```php
$action->assertQueryContains($model);
```

Asserts the constraints on the Lens's query method will return `$model`, an Eloquent model.

```php
$action->assertQueryMissing($model);
```

Asserts the constraints on the Lens's query method will *not* return `$model`, an Eloquent model.

```php
$action->assertWithFilters($model);
```

Asserts the response from the Lens's query method is constrained by `$request->withFilters()`.

```php
$action->assertWithOrdering($model);
```

Asserts the response from the Lens's query method is constrained by `$request->withOrdering()`.

## Resources

To create the testing object for a Nova Resource, add the test trait to your class, and invoke the test method.

```php
class TestClass extends TestCase
{
    use \NovaUnit\Actions\NovaResourceTest;

    public function testNovaResource()
    {
        $lens = $this->novaResource(MyResource::class);
    }
}
```

All methods used for asserting [fields](#field-assertions) and [actions](#action-assertions) can be used on Nova Resources.

## Shared Assertions

The following sets of methods can be run on a variety of Nova components.

### Action Assertions

Action assertions can be run on [Lenses](#lenses) and [Resources](#resources).

```php
$component->assertHasField($fieldName);
```

Asserts that `$fieldName` matches the name or ID/attribute of one of the fields returned by the `fields()` method

```php
$component->assertFieldMissing($fieldName);
```

Asserts that `$fieldName` does not match the name or ID/attribute of any fields returned by the `fields()` method

```php
$component->assertHasNoActions();
```

Asserts that the `actions()` method returns an empty array.

```php
$component->assertHasValidActions();
```

Asserts that all fields returned by the `fields()` method are valid Nova Fields.

### Field Assertions

Field assertions can be run on [Actions](#actions), [Lenses](#lenses) and [Resources](#resources).

```php
$component->assertHasAction($className);
```

Asserts that `$fieldName` is an instance of one of the actions returned by the `actions()` method

```php
$component->assertActionMissing($className);
```

Asserts that `$fieldName` is not an instance of any actions returned by the `actions()` method

```php
$component->assertHasNoActions();
```

Asserts that the `actions()` method returns an empty array.

```php
$component->assertHasValidActions();
```

Asserts that all actions returned by the `actions()` method are valid Nova Actions.
