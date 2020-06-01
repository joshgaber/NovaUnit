<?php

namespace JoshGaber\NovaUnit\Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;
use PHPUnit\Framework\AssertionFailedError;

class TestCase extends Orchestra
{
    protected function usesDatabase(): self
    {
        config()->set('database.connections.test', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
        config()->set('database.default', 'test');

        if (Schema::hasTable('mock_models')) {
            DB::table('mock_models')->truncate();
        } else {
            Schema::create('mock_models', function ($table) {
                $table->increments('id');
                $table->bigInteger('number')->nullable();
                $table->string('text')->nullable();
                $table->timestamps();
            });
        }

        return $this;
    }

    protected function shouldFail(): self
    {
        $this->expectException(AssertionFailedError::class);

        return $this;
    }
}
