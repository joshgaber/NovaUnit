<?php

namespace NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;
use NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use NovaUnit\Tests\Fixtures\Actions\ActionValidFields;

class ResourceValidFieldsAndActions extends Resource
{
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
