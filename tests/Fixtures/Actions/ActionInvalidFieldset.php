<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Actions;

use Laravel\Nova\Actions\Action;

class ActionInvalidFieldset extends Action
{
    public function fields()
    {
        return 'invalid';
    }
}
