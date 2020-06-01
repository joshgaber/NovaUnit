<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Lenses;

use JoshGaber\NovaUnit\Lenses\InvalidNovaLensException;
use JoshGaber\NovaUnit\Lenses\MockLens;
use JoshGaber\NovaUnit\Lenses\NovaLensTest;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensValidFieldsAndActions;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
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
