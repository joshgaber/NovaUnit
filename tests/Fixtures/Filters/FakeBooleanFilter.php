<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;

class FakeBooleanFilter extends BooleanFilter
{
    /**
     * {@inheritdoc}
     */
    public function apply(Request $request, $query, $value)
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
    public function options(Request $request)
    {
        return [
            'Alpha Choice' => 'alpha',
            'Beta Choice' => 'beta',
            'Gamma Choice' => 'gamma',
        ];
    }
}
