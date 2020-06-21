<?php

namespace JoshGaber\NovaUnit\Filters;

use Laravel\Nova\Filters\Filter;

trait NovaFilterTest
{
    /**
     * Initialize the Nova Filter mock.
     *
     * @param string $filter The class path of the Filter
     * @return MockFilter The Filter mock instance
     * @throws InvalidNovaFilterException If the supplied action class is not a Nova Filter
     */
    public static function novaFilter(string $filter): MockFilter
    {
        if (! \is_subclass_of($filter, Filter::class)) {
            throw new InvalidNovaFilterException();
        }

        return new MockFilter(new $filter);
    }
}
