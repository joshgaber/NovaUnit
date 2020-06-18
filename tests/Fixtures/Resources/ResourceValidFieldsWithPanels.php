<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Laravel\Nova\Resource;

class ResourceValidFieldsWithPanels extends Resource
{
    public function fields(Request $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            new Panel('Panel', [
                Number::make('Beta', 'field_beta'),
            ]),
        ];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
