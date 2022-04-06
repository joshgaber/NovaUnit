<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Actions;

use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ActionInvalidFields extends Action
{
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            new \stdClass(),
        ];
    }
}
