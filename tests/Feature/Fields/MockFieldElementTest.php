<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Fields;

use JoshGaber\NovaUnit\Resources\MockResource;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceForFieldTests;
use JoshGaber\NovaUnit\Tests\TestCase;

class MockFieldElementTest extends TestCase
{
    private $mock;

    public function setUp(): void
    {
        parent::setUp();
        $this->mock = new MockResource(new ResourceForFieldTests(new MockModel));
    }

    // region assertHasRule
    public function testItSucceedsIfFieldHasTheSpecifiedRule()
    {
        $this->mock->field('Alpha')->assertHasRule('max:128');
    }

    public function testItFailsIfFieldDoesNotHaveTheSpecifiedRule()
    {
        $this->shouldFail()->mock->field('Alpha')->assertHasRule('max:256');
    }

    // endregion

    // region assertRuleMissing
    public function testItSucceedsIfSpecifiedRuleMissingFromField()
    {
        $this->mock->field('Alpha')->assertRuleMissing('max:256');
    }

    public function testItFailsIfSpecifiedRuleNotMissingFromField()
    {
        $this->shouldFail()->mock->field('Alpha')->assertRuleMissing('max:128');
    }

    // endregion

    // region assertHasCreationRule
    public function testItSucceedsIfFieldHasTheSpecifiedCreationRule()
    {
        $this->mock->field('Epsilon')->assertHasCreationRule('min:8');
    }

    public function testItFailsIfFieldDoesNotHaveTheSpecifiedCreationRule()
    {
        $this->shouldFail()->mock->field('Epsilon')->assertHasCreationRule('min:100');
    }

    // endregion

    // region assertCreationRuleMissing
    public function testItSucceedsIfSpecifiedCreationRuleMissingFromField()
    {
        $this->mock->field('Epsilon')->assertCreationRuleMissing('min:100');
    }

    public function testItFailsIfSpecifiedCreationRuleNotMissingFromField()
    {
        $this->shouldFail()->mock->field('Epsilon')->assertCreationRuleMissing('min:8');
    }

    // endregion

    // region assertHasUpdateRule
    public function testItSucceedsIfFieldHasTheSpecifiedUpdateRule()
    {
        $this->mock->field('Epsilon')->assertHasUpdateRule('min:16');
    }

    public function testItFailsIfFieldDoesNotHaveTheSpecifiedUpdateRule()
    {
        $this->shouldFail()->mock->field('Epsilon')->assertHasUpdateRule('min:100');
    }

    // endregion

    // region assertUpdateRuleMissing
    public function testItSucceedsIfSpecifiedUpdateRuleMissingFromField()
    {
        $this->mock->field('Epsilon')->assertUpdateRuleMissing('min:100');
    }

    public function testItFailsIfSpecifiedUpdateRuleNotMissingFromField()
    {
        $this->shouldFail()->mock->field('Epsilon')->assertUpdateRuleMissing('min:16');
    }

    // endregion

    // region assertShownOnIndex
    public function testItSucceedsIfFieldIsShownOnIndex()
    {
        $this->mock->field('Beta')->assertShownOnIndex();
    }

    public function testItFailsIfFieldIsNotShownOnIndex()
    {
        $this->shouldFail()->mock->field('Gamma')->assertShownOnIndex();
    }

    // endregion

    // region assertHiddenFromIndex
    public function testItSucceedsIfFieldIsHiddenFromIndex()
    {
        $this->mock->field('Gamma')->assertHiddenFromIndex();
    }

    public function testItFailsIfFieldIsNotHiddenFromIndex()
    {
        $this->shouldFail()->mock->field('Beta')->assertHiddenFromIndex();
    }

    // endregion

    // region assertShownOnDetail
    public function testItSucceedsIfFieldIsShownOnDetail()
    {
        $this->mock->field('Beta')->assertShownOnDetail();
    }

    public function testItFailsIfFieldIsNotShownOnDetail()
    {
        $this->shouldFail()->mock->field('Gamma')->assertShownOnDetail();
    }

    // endregion

    // region assertHiddenFromDetail
    public function testItSucceedsIfFieldIsHiddenFromDetail()
    {
        $this->mock->field('Gamma')->assertHiddenFromDetail();
    }

    public function testItFailsIfFieldIsNotHiddenFromDetail()
    {
        $this->shouldFail()->mock->field('Beta')->assertHiddenFromDetail();
    }

    // endregion

    // region assertShownWhenCreating
    public function testItSucceedsIfFieldIsShownWhenCreating()
    {
        $this->mock->field('Beta')->assertShownWhenCreating();
    }

    public function testItFailsIfFieldIsNotShownWhenCreating()
    {
        $this->shouldFail()->mock->field('Gamma')->assertShownWhenCreating();
    }

    // endregion

    // region assertHiddenWhenCreating
    public function testItSucceedsIfFieldIsHiddenWhenCreating()
    {
        $this->mock->field('Gamma')->assertHiddenWhenCreating();
    }

    public function testItFailsIfFieldIsNotHiddenWhenCreating()
    {
        $this->shouldFail()->mock->field('Beta')->assertHiddenWhenCreating();
    }

    // endregion

    // region assertShownWhenUpdating
    public function testItSucceedsIfFieldIsShownWhenUpdating()
    {
        $this->mock->field('Beta')->assertShownWhenUpdating();
    }

    public function testItFailsIfFieldIsNotShownWhenUpdating()
    {
        $this->shouldFail()->mock->field('Gamma')->assertShownWhenUpdating();
    }

    // endregion

    // region assertHiddenWhenUpdating
    public function testItSucceedsIfFieldIsHiddenWhenUpdating()
    {
        $this->mock->field('Gamma')->assertHiddenWhenUpdating();
    }

    public function testItFailsIfFieldIsNotHiddenWhenUpdating()
    {
        $this->shouldFail()->mock->field('Beta')->assertHiddenWhenUpdating();
    }

    // endregion

    // region assertNullable
    public function testItSucceedsIfFieldIsNullable()
    {
        $this->mock->field('Delta')->assertNullable();
    }

    public function testItFailsIfFieldIsNotNullable()
    {
        $this->shouldFail()->mock->field('Alpha')->assertNullable();
    }

    // endregion

    // region assertNotNullable
    public function testItSucceedsIfFieldIsNotNullable()
    {
        $this->mock->field('Alpha')->assertNotNullable();
    }

    public function testItFailsIfFieldIsNotNotNullable()
    {
        $this->shouldFail()->mock->field('Delta')->assertNotNullable();
    }

    // endregion

    // region assertSortable
    public function testItSucceedsIfFieldIsSortable()
    {
        $this->mock->field('Delta')->assertSortable();
    }

    public function testItFailsIfFieldIsNotSortable()
    {
        $this->shouldFail()->mock->field('Alpha')->assertSortable();
    }

    // endregion

    // region assertNotSortable
    public function testItSucceedsIfFieldIsNotSortable()
    {
        $this->mock->field('Alpha')->assertNotSortable();
    }

    public function testItFailsIfFieldIsNotNotSortable()
    {
        $this->shouldFail()->mock->field('Delta')->assertNotSortable();
    }

    // endregion
}
