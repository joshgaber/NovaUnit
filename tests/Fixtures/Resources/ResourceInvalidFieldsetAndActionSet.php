<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class ResourceInvalidFieldsetAndActionSet extends Resource
{
    public static $model = MockModel::class;

    public function fields(NovaRequest $request)
    {
        return 'fields';
    }

    public function actions(NovaRequest $request)
    {
        return 'actions';
    }

    public function filters(NovaRequest $request)
    {
        return 'filters';
    }
}
