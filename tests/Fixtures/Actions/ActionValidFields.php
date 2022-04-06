<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Actions;

use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ActionValidFields extends Action
{
    public function handle()
    {
        return Action::message('Test Message');
    }

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            Number::make('Beta', 'field_beta'),
        ];
    }
}
