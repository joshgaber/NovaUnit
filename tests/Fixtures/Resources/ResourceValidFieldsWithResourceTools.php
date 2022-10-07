<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use JoshGaber\NovaUnit\Tests\Fixtures\Tools\ResourceTool;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class ResourceValidFieldsWithResourceTools extends Resource
{
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            ResourceTool::make(),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
