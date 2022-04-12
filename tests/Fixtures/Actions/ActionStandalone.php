<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Actions;

use Laravel\Nova\Actions\Action;
use Laravel\Nova\Http\Requests\NovaRequest;

class ActionStandalone extends Action
{
    public function fields(NovaRequest $request)
    {
        return [];
    }
}
