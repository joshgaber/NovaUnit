<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Filters\FakeBooleanFilter;
use JoshGaber\NovaUnit\Tests\Fixtures\Filters\FakeSelectFilter;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class ResourceValidFieldsAndActions extends Resource
{
    public static $model = MockModel::class;

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            Number::make('Beta', 'field_beta'),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            new ActionValidFields(),
            new ActionNoFields(),
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new FakeSelectFilter(),
            new FakeBooleanFilter(),
        ];
    }
}
