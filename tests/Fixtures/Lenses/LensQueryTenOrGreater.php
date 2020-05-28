<?php

namespace NovaUnit\Tests\Fixtures\Lenses;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;
use NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use NovaUnit\Tests\Fixtures\Actions\ActionValidFields;

class LensQueryTenOrGreater extends Lens
{
    public static function query(LensRequest $request, $query)
    {
        return $query->where('number', '>=', 10);
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            Number::make('Beta', 'field_beta'),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new ActionValidFields(),
            new ActionNoFields(),
        ];
    }
}
