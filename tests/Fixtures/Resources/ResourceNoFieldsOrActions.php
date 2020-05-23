<?php

namespace NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Resource;

class ResourceNoFieldsOrActions extends Resource
{
    public function fields(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
