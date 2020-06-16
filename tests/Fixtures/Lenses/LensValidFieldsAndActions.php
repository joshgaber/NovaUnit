<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Lenses;

use Illuminate\Http\Request;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;

class LensValidFieldsAndActions extends Lens
{
    public static function query(LensRequest $request, $query)
    {
        return $query;
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
