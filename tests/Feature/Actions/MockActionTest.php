<?php

namespace NovaUnit\Tests\Feature\Actions;

use NovaUnit\Actions\MockAction;
use NovaUnit\Actions\MockActionResponse;
use NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use NovaUnit\Tests\TestCase;

class MockActionTest extends TestCase
{
    public function testItReturnsAMockActionOnHandle()
    {
        $mockAction = new MockAction(new ActionValidFields());
        $mockResult = $mockAction->handle([], []);

        $this->assertInstanceOf(MockActionResponse::class, $mockResult);
    }
}
