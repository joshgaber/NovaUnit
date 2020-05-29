<?php

namespace NovaUnit\Tests\Feature\Lenses;

use NovaUnit\Lenses\InvalidNovaLensException;
use NovaUnit\Lenses\MockLens;
use NovaUnit\Lenses\NovaLensTest;
use NovaUnit\Tests\Fixtures\Lenses\LensValidFieldsAndActions;
use NovaUnit\Tests\Fixtures\MockModel;
use PHPUnit\Framework\TestCase;

class NovaLensTestTest extends TestCase
{
    public $novaLensTest;

    public function setUp(): void
    {
        parent::setUp();
        $this->novaLensTest = new class {
            use NovaLensTest;
        };
    }

    public function testItWillCreateAMockLensTestClassWithValidLens()
    {
        $mock = $this->novaLensTest->novaLens(LensValidFieldsAndActions::class, MockModel::class);

        $this->assertInstanceOf(MockLens::class, $mock);
    }

    public function testItWillThrowExceptionWithNoValidLens()
    {
        $this->expectException(InvalidNovaLensException::class);
        $mock = $this->novaLensTest->novaLens(\stdClass::class, MockModel::class);
    }
}
