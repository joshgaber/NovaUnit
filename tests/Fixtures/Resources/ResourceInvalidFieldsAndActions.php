<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Filters\FakeSelectFilter;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class ResourceInvalidFieldsAndActions extends Resource
{
    public static $model = MockModel::class;

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            new \stdClass(),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            new ActionValidFields(),
            new \stdClass(),
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new FakeSelectFilter(),
            new \stdClass(),
        ];
    }
}
