<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class FakeSelectFilter extends Filter
{
    /**
     * {@inheritdoc}
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('text', $value);
    }

    /**
     * {@inheritdoc}
     */
    public function options(Request $request)
    {
        return [
            'Alpha Choice' => 'alpha',
            'Beta Choice' => 'beta',
            'Gamma Choice' => 'gamma',
        ];
    }
}
