<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Resource;

class ResourceInvalidFieldsetAndActionSet extends Resource
{
    public function fields(Request $request)
    {
        return 'fields';
    }

    public function actions(Request $request)
    {
        return 'actions';
    }
}
