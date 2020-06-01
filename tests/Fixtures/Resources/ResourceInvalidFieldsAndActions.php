<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

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
