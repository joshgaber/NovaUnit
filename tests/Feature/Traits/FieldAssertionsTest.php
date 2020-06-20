<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Traits;

use JoshGaber\NovaUnit\Actions\MockAction;
use JoshGaber\NovaUnit\Fields\FieldNotFoundException;
use JoshGaber\NovaUnit\Fields\MockFieldElement;
use JoshGaber\NovaUnit\Lenses\MockLens;
use JoshGaber\NovaUnit\Resources\MockResource;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionInvalidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionInvalidFieldset;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensValidFieldsWithPanels;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceValidFieldsWithPanels;
use JoshGaber\NovaUnit\Tests\TestCase;

class FieldAssertionsTest extends TestCase
{
    // region assertHasNoFields
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

    // endregion

    // region asssertHasValidFields
    public function testItSucceedsIfAllFieldsAreValid()
    {
        $mock = new MockAction(new ActionValidFields());
        $mock->assertHasValidFields();
    }

    public function testItCanValidateAllFieldsOnResourcesWithPanels()
    {
        $mock = new MockResource(new ResourceValidFieldsWithPanels(new MockModel()));
        $mock->assertHasValidFields();
    }

    public function testItCanValidateAllFieldsOnLensWithPanels()
    {
        $mock = new MockLens(new LensValidFieldsWithPanels(), MockModel::class);
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

    // endregion

    // region assertHasField
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

    public function testItCanSearchResourcesForFieldRecursively()
    {
        $mock = new MockResource(new ResourceValidFieldsWithPanels(new MockModel()));
        $mock->assertHasField('field_beta');
    }

    public function testItCanSearchLensesForFieldRecursively()
    {
        $mock = new MockLens(new LensValidFieldsWithPanels(), MockModel::class);
        $mock->assertHasField('field_beta');
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

    // endregion

    // region assertFieldMissing
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

    // endregion

    // region field
    public function testItWillReturnAFieldMockOnExistingField()
    {
        $mock = new MockAction(new ActionValidFields());
        $fieldMock = $mock->field('Alpha');
        $this->assertInstanceOf(MockFieldElement::class, $fieldMock);
    }

    public function testItWillThrowExceptionIfMockingFieldThatDoesNotExist()
    {
        $this->expectException(FieldNotFoundException::class);
        $mock = new MockAction(new ActionValidFields());
        $mock->field('Not Exists');
    }

    // endregion
}
