<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Resources;

use JoshGaber\NovaUnit\Resources\InvalidNovaResourceException;
use JoshGaber\NovaUnit\Resources\MockResource;
use JoshGaber\NovaUnit\Resources\NovaResourceTest;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceValidFieldsAndActions;
use PHPUnit\Framework\TestCase;

class NovaResourceTestTest extends TestCase
{
    public $novaResourceTest;

    public function setUp(): void
    {
        parent::setUp();
        $this->novaResourceTest = new class {
            use NovaResourceTest;
        };
    }

    public function testItWillCreateAMockResourceTestClassWithValidResource()
    {
        $mock = $this->novaResourceTest->novaResource(ResourceValidFieldsAndActions::class, new MockModel());

        $this->assertInstanceOf(MockResource::class, $mock);
    }

    public function testItWillCreateAMockResourceTestClassWithValidResourceAndNoModel()
    {
        $mock = $this->novaResourceTest->novaResource(ResourceValidFieldsAndActions::class);

        $this->assertInstanceOf(MockResource::class, $mock);
    }

    public function testItWillThrowExceptionWithInvalidResource()
    {
        $this->expectException(InvalidNovaResourceException::class);
        $mock = $this->novaResourceTest->novaResource(\stdClass::class, new MockModel());
    }
}
