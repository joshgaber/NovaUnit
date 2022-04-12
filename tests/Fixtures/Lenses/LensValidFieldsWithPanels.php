<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Lenses;

use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Panel;

class LensValidFieldsWithPanels extends Lens
{
    public static function query(LensRequest $request, $query)
    {
    }

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            new Panel('Panel', [
                Number::make('Beta', 'field_beta'),
            ]),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            new ActionValidFields(),
            new ActionNoFields(),
        ];
    }
}
