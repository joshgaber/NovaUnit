<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Traits;

use JoshGaber\NovaUnit\Actions\MockAction;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionInvalidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionInvalidFieldset;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\TestCase;

class FieldAssertionsTest extends TestCase
{
    public function testItSucceedsIfActionHasNoFields()
    {
        $mock = new MockAction(new ActionNoFields());
        $mock->assertHasNoFields();
    }

    public function testItFailsIfActionHasFields()
    {
        $this->shouldFail();
        $mock = new MockAction(new ActionValidFields());
        $mock->assertHasNoFields();
    }

    public function testItSucceedsIfAllFieldsAreValid()
    {
        $mock = new MockAction(new ActionValidFields());
        $mock->assertHasValidFields();
    }

    public function testItFailsIfAtLeastOneFieldIsNotAValidField()
    {
        $this->shouldFail();
        $mock = new MockAction(new ActionInvalidFields());
        $mock->assertHasValidFields();
    }

    public function testItFailsIfNotValidFieldset()
    {
        $this->shouldFail();
        $mock = new MockAction(new ActionInvalidFieldset());
        $mock->assertHasValidFields();
    }

    public function testItSucceedsWhenSearchingForFieldByName()
    {
        $mock = new MockAction(new ActionValidFields());
        $mock->assertHasField('alpha');
    }

    public function testItSucceedsWhenSearchingForFieldByAttribute()
    {
        $mock = new MockAction(new ActionValidFields());
        $mock->assertHasField('field_alpha');
    }

    public function testItFailsWhenSearchingForFieldByAttributeCaseSensitive()
    {
        $this->shouldFail();
        $mock = new MockAction(new ActionValidFields());
        $mock->assertHasField('Field_Alpha');
    }

    public function testItFailsWhenNoFieldHasEitherNameOrAttributeGiven()
    {
        $this->shouldFail();
        $mock = new MockAction(new ActionValidFields());
        $mock->assertHasField('gamma');
    }

    public function testItSucceedsWhenNoFieldMatchesByNameOrAttribute()
    {
        $mock = new MockAction(new ActionValidFields());
        $mock->assertFieldMissing('gamma');
    }

    public function testItSucceedsWhenFieldDoesNotMatchAttributeExactCase()
    {
        $mock = new MockAction(new ActionValidFields());
        $mock->assertFieldMissing('Field_Alpha');
    }

    public function testItFailsWhenFieldMatchesAttribute()
    {
        $this->shouldFail();
        $mock = new MockAction(new ActionValidFields());
        $mock->assertFieldMissing('field_alpha');
    }

    public function testItFailsWhenFieldMatchesName()
    {
        $this->shouldFail();
        $mock = new MockAction(new ActionValidFields());
        $mock->assertFieldMissing('alpha');
    }
}
