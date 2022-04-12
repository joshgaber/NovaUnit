<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Filters;

use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class FakeSelectFilter extends Filter
{
    /**
     * {@inheritdoc}
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query->where('text', $value);
    }

    /**
     * {@inheritdoc}
     */
    public function options(NovaRequest $request)
    {
        return [
            'Alpha Choice' => 'alpha',
            'Beta Choice' => 'beta',
            'Gamma Choice' => 'gamma',
        ];
    }
}
