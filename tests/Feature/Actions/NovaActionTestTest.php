<?php

namespace NovaUnit\Tests\Feature\Actions;

use NovaUnit\Actions\InvalidNovaActionException;
use NovaUnit\Actions\MockAction;
use NovaUnit\Actions\NovaActionTest;
use NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use PHPUnit\Framework\TestCase;

class NovaActionTestTest extends TestCase
{
    public $novaActionTest;

    public function setUp(): void
    {
        parent::setUp();
        $this->novaActionTest = new class {
            use NovaActionTest;
        };
    }

    public function testItWillCreateAMockActionTestClassWithValidAction()
    {
        $mock = $this->novaActionTest->novaAction(ActionValidFields::class);

        $this->assertInstanceOf(MockAction::class, $mock);
    }

    public function testItWillThrowExceptionWithInvalidAction()
    {
        $this->expectException(InvalidNovaActionException::class);
        $mock = $this->novaActionTest->novaAction(\stdClass::class);
    }
}
