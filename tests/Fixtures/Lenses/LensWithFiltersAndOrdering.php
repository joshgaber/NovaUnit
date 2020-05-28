<?php

namespace NovaUnit\Tests\Fixtures\Lenses;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;

class LensWithFiltersAndOrdering extends Lens
{
    public static function query(LensRequest $request, $query)
    {
        return $request->withFilters($request->withOrdering($query));
    }

    public function fields(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
