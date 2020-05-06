<?php

namespace Joshgaber\Novaunit\Tests;

use Orchestra\Testbench\TestCase;
use Joshgaber\Novaunit\NovaunitServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [NovaunitServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
