<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Filters;

use Laravel\Nova\Filters\DateFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class FakeDateFilter extends DateFilter
{
    /**
     * {@inheritdoc}
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query->where('date', '>=', $value);
    }
}
