<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Actions;

use JoshGaber\NovaUnit\Resources\MockResource;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceForActionTests;
use JoshGaber\NovaUnit\Tests\TestCase;

class MockActionElementTest extends TestCase
{
    private $mock;

    public function setUp(): void
    {
        parent::setUp();
        $this->mock = new MockResource(new ResourceForActionTests(new MockModel));
    }

    // region assertShownOnIndex
    public function testItSucceedsIfFieldIsShownOnIndex()
    {
        $this->mock->action(ActionNoFields::class)->assertShownOnIndex();
    }

    public function testItFailsIfFieldIsNotShownOnIndex()
    {
        $this->shouldFail()->mock->action(ActionValidFields::class)->assertShownOnIndex();
    }

    // endregion

    // region assertHiddenFromIndex
    public function testItSucceedsIfFieldIsHiddenFromIndex()
    {
        $this->mock->action(ActionValidFields::class)->assertHiddenFromIndex();
    }

    public function testItFailsIfFieldIsNotHiddenFromIndex()
    {
        $this->shouldFail()->mock->action(ActionNoFields::class)->assertHiddenFromIndex();
    }

    // endregion

    // region assertShownOnDetail
    public function testItSucceedsIfFieldIsShownOnDetail()
    {
        $this->mock->action(ActionValidFields::class)->assertShownOnDetail();
    }

    public function testItFailsIfFieldIsNotShownOnDetail()
    {
        $this->shouldFail()->mock->action(ActionNoFields::class)->assertShownOnDetail();
    }

    // endregion

    // region assertHiddenFromDetail
    public function testItSucceedsIfFieldIsHiddenFromDetail()
    {
        $this->mock->action(ActionNoFields::class)->assertHiddenFromDetail();
    }

    public function testItFailsIfFieldIsNotHiddenFromDetail()
    {
        $this->shouldFail()->mock->action(ActionValidFields::class)->assertHiddenFromDetail();
    }

    // endregion

    // region assertShownOnTableRow
    public function testItSucceedsIfFieldIsShownOnTableRow()
    {
        $this->mock->action(ActionNoFields::class)->assertShownOnTableRow();
    }

    public function testItFailsIfFieldIsNotShownOnTableRow()
    {
        $this->shouldFail()->mock->action(ActionValidFields::class)->assertShownOnTableRow();
    }

    // endregion

    // region assertHiddenFromTableRow
    public function testItSucceedsIfFieldIsHiddenFromTableRow()
    {
        $this->mock->action(ActionValidFields::class)->assertHiddenFromTableRow();
    }

    public function testItFailsIfFieldIsNotHiddenFromTableRow()
    {
        $this->shouldFail()->mock->action(ActionNoFields::class)->assertHiddenFromTableRow();
    }

    // endregion
}
