<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Actions;

use Laravel\Nova\Actions\Action;
use Laravel\Nova\Http\Requests\NovaRequest;

class ActionNoFields extends Action
{
    public function fields(NovaRequest $request)
    {
        return [];
    }
}
