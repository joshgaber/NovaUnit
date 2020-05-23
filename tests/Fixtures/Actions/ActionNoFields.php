<?php

namespace NovaUnit\Tests\Fixtures\Actions;

use Laravel\Nova\Actions\Action;

class ActionNoFields extends Action
{
    public function fields()
    {
        return [];
    }
}
