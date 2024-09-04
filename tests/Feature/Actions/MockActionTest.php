<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Actions;

use JoshGaber\NovaUnit\Actions\MockAction;
use JoshGaber\NovaUnit\Actions\MockActionResponse;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\TestCase;
use Laravel\Nova\Http\Requests\NovaRequest;

class MockActionTest extends TestCase
{
    public function testItReturnsAMockActionOnHandle()
    {
        $mockAction = new MockAction(new ActionValidFields());
        $mockResult = $mockAction->handle([], []);

        $this->assertInstanceOf(MockActionResponse::class, $mockResult);
    }

    public function testItReturnsMockActionFields()
    {
        $mockAction = new MockAction(new ActionValidFields());

        $this->assertIsArray($mockAction->getFields());

        $this->assertIsArray($mockAction->getFields(NovaRequest::createFromGlobals()));
    }
}
