<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\DateFilter;

class FakeDateFilter extends DateFilter
{
    /**
     * {@inheritdoc}
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('date', '>=', $value);
    }
}
