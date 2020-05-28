<?php

namespace NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;
use NovaUnit\Tests\Fixtures\Actions\ActionValidFields;

class ResourceInvalidFieldsAndActions extends Resource
{
    public function fields(Request $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            new \stdClass(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new ActionValidFields(),
            new \stdClass(),
        ];
    }
}
