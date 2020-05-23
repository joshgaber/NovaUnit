<?php

namespace NovaUnit\Resources;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Resource;

trait NovaResourceTest
{
    /**
     * Initialize the Nova Resource mock.
     *
     * @param string $class The class path of the Resource
     * @param Model $model The object to apply to this Resource
     * @return MockResource The Resource mock instance
     * @throws InvalidNovaResourceException If the supplied action class is not a Nova Resource
     */
    public function testNovaResource(string $class, Model $model): MockResource
    {
        if (! \is_subclass_of($class, Resource::class)) {
            throw new InvalidNovaResourceException();
        }

        return new MockResource(new $class($model));
    }
}
