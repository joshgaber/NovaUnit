# Actions

* [Testing Actions](#testing-actions)
* [Testing Action Handle](#testing-action-handle)
* [Testing Actions on Components](#testing-actions-on-components)
* [Testing Actions Individually](#testing-actions-individually)

## Testing Actions

To create the testing object for a Nova Action, add the `NovaActionTest` trait to your class, and invoke the test method.

```php
class TestClass extends TestCase
{
    use NovaActionTest;

    public function testNovaAction()
    {
        $action = $this->novaAction(MyAction::class);
    }
}
```

The following assertions can be run on the Nova Action:

* [Fields](fields.md#testing-fields-on-components)

## Testing Action Handle

```php
$response = $action->handle($fields, $models);
```

Invokes the `handle` method on the action with the given parameters.

* `$fields` - A key-value array with the input values of the action fields, indexed by attribute. Eg., `['name' => 'John Smith']`
* `$models` - A list of the models to apply the action to. Value can be either an array, an Eloquent collection, or a single Model.

### `assertMessage()`

```php
$response->assertMessage();
```

Assert that this action will return an `Action::message()` response with the given input

### `assertDanger()`

```php
$response->assertDanger();
```

Assert that this action will return an `Action::danger()` response with the given input

### `assertDeleted()`

```php
$response->assertDeleted();
```

Assert that this action will return an `Action::deleted()` response with the given input

### `assertRedirect()`

```php
$response->assertRedirect();
```

Assert that this action will return an `Action::redirect()` response with the given input

### `assertPush()`

```php
$response->assertPush();
```

Assert that this action will return an `Action::push()` response with the given input

### `assertOpenInNewTab()`

```php
$response->assertOpenInNewTab();
```

Assert that this action will return an `Action::openInNewTab()` response with the given input

### `assertDownload()`

```php
$response->assertDownload();
```

Assert that this action will return an `Action::download()` response with the given input

### `assertMessageContains($contents)`

```php
$response->assertMessageContains('Success');
```

Assert that the `Action::message()` response contains `$contents`

### `assertDangerContains($contents)`

```php
$response->assertDangerContains('Failure');
```

Assert that the `Action::danger()` response contains `$contents`

## Testing Actions on Components

Action assertions can be run on the following Nova classes:

* [Lenses](lenses.md#testing-lenses)
* [Resources](resources.md#testing-resources)

### `assertHasAction($action)`

```php
$component->assertHasAction(MyAction::class);
```

Asserts that the provided class path `$action` matches one of the actions returned by the `actions()` method

### `assertActionMissing($action)`

```php
$component->assertActionMissing(MyAction::class);
```

Asserts that the provided class path `$action` does not match any actions returned by the `actions()` method

### `assertHasNoAction()`

```php
$component->assertHasNoActions();
```

Asserts that the `actions()` method returns an empty array.

### `assertHasValidActions()`

```php
$component->assertHasValidActions();
```

Asserts that all actions returned by the `actions()` method are valid Nova Actions.

## Testing Actions Individually

```php
$action = $component->action(MyAction::class);
```

Searches the `actions()` method on the component for the first occurance of an action matching the provided class name, and returns a testing object.

### `assertShownOnIndex()`

```php
$action->assertShownOnIndex();
```

Asserts that the action will be shown on this component's index view.

### `assertHiddenFromIndex()`

```php
$action->assertHiddenFromIndex();
```

Asserts that the action will be hidden from this component's index view.

### `assertShownOnDetail()`

```php
$action->assertShownOnDetail();
```

Asserts that the action will be shown on this component's detail view.

### `assertHiddenFromDetail()`

```php
$action->assertHiddenFromDetail();
```

Asserts that the action will be hidden from this component's detail view.

### `assertShownInline()`

```php
$action->assertShownInline();
```

Asserts that the action will be shown on this component's table row view.

### `assertNotShownInline()`

```php
$action->assertNotShownInline();
```

Asserts that the action will be hidden from this component's table row view.
