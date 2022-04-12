<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Laravel\Nova\Resource;

class ResourceValidFieldsWithPanels extends Resource
{
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
        return [];
    }
}
