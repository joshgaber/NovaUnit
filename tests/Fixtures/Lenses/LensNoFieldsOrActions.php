<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Lenses;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;

class LensNoFieldsOrActions extends Lens
{
    public static function query(LensRequest $request, $query)
    {
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
