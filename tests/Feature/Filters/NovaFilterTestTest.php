<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Filters;

use JoshGaber\NovaUnit\Filters\InvalidNovaFilterException;
use JoshGaber\NovaUnit\Filters\MockFilter;
use JoshGaber\NovaUnit\Filters\NovaFilterTest;
use JoshGaber\NovaUnit\Tests\Fixtures\Filters\FakeSelectFilter;
use PHPUnit\Framework\TestCase;

class NovaFilterTestTest extends TestCase
{
    public $novaFilterTest;

    public function setUp(): void
    {
        parent::setUp();
        $this->novaFilterTest = new class {
            use NovaFilterTest;
        };
    }

    public function testItWillCreateAMockLensTestClassWithValidLens()
    {
        $mock = $this->novaFilterTest->novaFilter(FakeSelectFilter::class);

        $this->assertInstanceOf(MockFilter::class, $mock);
    }

    public function testItWillThrowExceptionWithNoValidLens()
    {
        $this->expectException(InvalidNovaFilterException::class);
        $this->novaFilterTest->novaFilter(\stdClass::class);
    }
}
