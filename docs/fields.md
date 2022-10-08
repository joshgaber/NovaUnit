# Fields

* [Testing Fields on Components](#testing-fields-on-components)
* [Testing Fields Individually](#testing-fields-individually)

## Testing Fields on Components

Field assertions can be run on the following Nova classes:

* [Actions](actions.md#testing-actions)
* [Lenses](lenses.md#testing-lenses)
* [Resources](resources.md#testing-resources)

### `assertHasField($field)`

```php
$component->assertHasField('field_name');
```

Asserts that the provided string matches the name or attribute of one of the fields returned by the `fields()` method

### `assertFieldMissing($field)`

```php
$component->assertFieldMissing('field_name');
```

Asserts that the provided string does not match the name or attribute of one of the fields returned by the `fields()` method

### `assertHasNoFields()`

```php
$component->assertHasNoFields();
```

Asserts that the `fields()` method returns an empty array.

### `assertHasValidFields()`

```php
$component->assertHasValidFields();
```

Asserts that all fields returned by the `fields()` method are valid. Examples of valid fields include:
* `Field` instances
* `FieldElement` instances
* `Panel` instances (including any nested objects)

## Testing Fields Individually

To test configuration of a component's individual fields, you may use the `field($fieldName)` method:

```php
$field = $component->field('field_name');
```

Searches the components `fields()` array for a field with a name or attribute matching `$fieldname`, and returns first occurrence in a testing class.

### `assertHasRule($rule)`

```php
$field->assertHasRule('required');
```

Asserts that the following rule is being applied to the value of this field. This assertion only works on string-type rules, not closures.

### `assertRuleMissing($rule)`

```php
$field->assertRuleMissing('required');
```

Asserts that the following rule is not being applied to the value of this field. This assertion only works on string-type rules, not closures.

### `assertHasCreationRule($rule)`

```php
$field->assertHasCreationRule('required');
```

Asserts that the following rule is being applied to the value of this field when a resource is created. This assertion only works on string-type rules, not closures.

### `assertCreationRuleMissing($rule)`

```php
$field->assertCreationRuleMissing('required');
```

Asserts that the following rule is not being applied to the value of this field when a resource is created. This assertion only works on string-type rules, not closures.

### `assertHasUpdateRule($rule)`

```php
$field->assertHasUpdateRule('required');
```

Asserts that the following rule is being applied to the value of this field when a resource is updated. This assertion only works on string-type rules, not closures.

### `assertUpdateRuleMissing($rule)`

```php
$field->assertUpdateRuleMissing('required');
```

Asserts that the following rule is not being applied to the value of this field when a resource is updated. This assertion only works on string-type rules, not closures.

### `assertShownOnIndex()`

```php
$field->assertShownOnIndex();
```

Asserts that the field will be shown on the component's index view.

### `assertHiddenFromIndex()`

```php
$field->assertHiddenFromIndex();
```

Asserts that the field will be hidden from the component's index view.

### `assertShownOnDetail()`

```php
$field->assertShownOnDetail();
```

Asserts that the field will be shown on the component's detail view.

### `assertHiddenFromDetail()`

```php
$field->assertHiddenFromDetail();
```

Asserts that the field will be hidden from the component's detail view.

### `assertNullable()`

```php
$field->assertNullable();
```

Asserts that the value of this field will be set to null if left empty.

### `assertNotNullable()`

```php
$field->assertNotNullable();
```

Asserts that the value of this field will not be set to null if left empty.

### `assertSortable()`

```php
$field->assertSortable();
```

Asserts that the component's records can be sorted by this field.

### `assertNotSortable()`

```php
$field->assertNotSortable();
```

Asserts that the component's records cannot be sorted by this field.
