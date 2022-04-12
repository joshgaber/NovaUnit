<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Filters;

use Laravel\Nova\Filters\BooleanFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class FakeBooleanFilter extends BooleanFilter
{
    /**
     * {@inheritdoc}
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        if ($value['alpha']) {
            $query->orWhere('text', 'alpha');
        }
        if ($value['beta']) {
            $query->orWhere('text', 'beta');
        }
        if ($value['gamma']) {
            $query->orWhere('text', 'gamma');
        }

        return $query;
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
