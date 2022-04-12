<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Lenses;

use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Lenses\Lens;

class LensNoFieldsOrActions extends Lens
{
    public static function query(LensRequest $request, $query)
    {
    }

    public function fields(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
