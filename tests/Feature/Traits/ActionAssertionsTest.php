<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Traits;

use JoshGaber\NovaUnit\Resources\MockResource;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionInvalidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceInvalidFieldsAndActions;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceInvalidFieldsetAndActionSet;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceNoFieldsOrActions;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceValidFieldsAndActions;
use JoshGaber\NovaUnit\Tests\TestCase;

class ActionAssertionsTest extends TestCase
{
    public function testItSucceedsIfComponentHasNoActions()
    {
        $mock = new MockResource(new ResourceNoFieldsOrActions(new MockModel()));
        $mock->assertHasNoActions();
    }

    public function testItFailsIfComponentHasFields()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel()));
        $mock->assertHasNoActions();
    }

    public function testItSucceedsIfAllActionsAreValid()
    {
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel()));
        $mock->assertHasValidActions();
    }

    public function testItFailsIfAtLeastOneFieldIsNotAValidField()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceInvalidFieldsAndActions(new MockModel()));
        $mock->assertHasValidActions();
    }

    public function testItFailsIfNotValidActionSet()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceInvalidFieldsetAndActionSet(new MockModel()));
        $mock->assertHasValidActions();
    }

    public function testItSucceedsWhenSearchingForActionByType()
    {
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel()));
        $mock->assertHasAction(ActionValidFields::class);
    }

    public function testItFailsWhenActionNotSetOnComponent()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel()));
        $mock->assertHasAction(ActionInvalidFields::class);
    }

    public function testItSucceedsWhenNoActionMatchesProvidedType()
    {
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel()));
        $mock->assertActionMissing(ActionInvalidFields::class);
    }

    public function testItFailsWhenAnActionMatchesProvidedType()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel()));
        $mock->assertActionMissing(ActionValidFields::class);
    }
}
