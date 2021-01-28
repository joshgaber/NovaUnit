# Resources

* [Testing Resources](#testing-resources)

## Testing Resources

To create the testing object for a Nova Resource, add the `NovaResourceTest` trait to your class, and invoke the test method.

```php
class TestClass extends TestCase
{
    use NovaResourceTest;

    public function testNovaResource()
    {
        $resource = $this->novaResource(UserResource::class);
    }
}
```

The following assertions can be run on the Nova Resource:

* [Action Tests](actions.md#testing-actions-on-components)
* [Field Tests](fields.md#testing-fields-on-components)
* [Filter Tests](filters.md#testing-filters-on-components)
