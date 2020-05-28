<?php

namespace NovaUnit\Tests\Feature\Resources;

use NovaUnit\Resources\InvalidNovaResourceException;
use NovaUnit\Resources\MockResource;
use NovaUnit\Resources\NovaResourceTest;
use NovaUnit\Tests\Fixtures\MockModel;
use NovaUnit\Tests\Fixtures\Resources\ResourceValidFieldsAndActions;
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
        $mock = $this->novaResourceTest->testNovaResource(ResourceValidFieldsAndActions::class, new MockModel());

        $this->assertInstanceOf(MockResource::class, $mock);
    }

    public function testItWillThrowExceptionWithInvalidResource()
    {
        $this->expectException(InvalidNovaResourceException::class);
        $mock = $this->novaResourceTest->testNovaResource(\stdClass::class, new MockModel());
    }
}
