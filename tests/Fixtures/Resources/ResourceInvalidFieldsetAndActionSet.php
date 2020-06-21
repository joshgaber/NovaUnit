<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use Laravel\Nova\Resource;

class ResourceInvalidFieldsetAndActionSet extends Resource
{
    public static $model = MockModel::class;

    public function fields(Request $request)
    {
        return 'fields';
    }

    public function actions(Request $request)
    {
        return 'actions';
    }

    public function filters(Request $request)
    {
        return 'filters';
    }
}
