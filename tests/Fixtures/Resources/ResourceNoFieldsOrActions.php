<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use Laravel\Nova\Resource;

class ResourceNoFieldsOrActions extends Resource
{
    public static $model = MockModel::class;

    public function fields(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
