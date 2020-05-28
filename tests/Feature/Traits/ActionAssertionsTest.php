<?php

namespace NovaUnit\Tests\Feature\Traits;

use NovaUnit\Resources\MockResource;
use NovaUnit\Tests\Fixtures\Actions\ActionInvalidFields;
use NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use NovaUnit\Tests\Fixtures\MockModel;
use NovaUnit\Tests\Fixtures\Resources\ResourceInvalidFieldsAndActions;
use NovaUnit\Tests\Fixtures\Resources\ResourceInvalidFieldsetAndActionSet;
use NovaUnit\Tests\Fixtures\Resources\ResourceNoFieldsOrActions;
use NovaUnit\Tests\Fixtures\Resources\ResourceValidFieldsAndActions;
use NovaUnit\Tests\TestCase;

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
