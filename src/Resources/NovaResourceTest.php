<?php

namespace JoshGaber\NovaUnit\Resources;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Resource;

trait NovaResourceTest
{
    /**
     * Initialize the Nova Resource mock.
     *
     * @param  string  $class  The class path of the Resource
     * @param  Model|null  $model  The object to apply to this Resource
     * @return MockResource The Resource mock instance
     *
     * @throws InvalidNovaResourceException If the supplied action class is not a Nova Resource
     */
    public static function novaResource(string $class, ?Model $model = null): MockResource
    {
        if (! \is_subclass_of($class, Resource::class)) {
            throw new InvalidNovaResourceException();
        }

        $modelClass = get_class_vars($class)['model'];

        return new MockResource(new $class($model ?? new $modelClass));
    }
}
