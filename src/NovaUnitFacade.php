<?php

namespace JoshGaber\NovaUnit;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JoshGaber\NovaUnit\Skeleton\SkeletonClass
 */
class NovaUnitFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'novaunit';
    }
}
