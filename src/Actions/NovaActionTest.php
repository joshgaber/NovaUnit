<?php

namespace JoshGaber\NovaUnit\Actions;

use Laravel\Nova\Actions\Action;

trait NovaActionTest
{
    /**
     * Initialize the Nova Action mock.
     *
     * @param string $action The class path of the Action
     * @return MockAction The Action mock instance
     * @throws InvalidNovaActionException If the supplied action class is not a Nova Action
     */
    public static function novaAction(string $action): MockAction
    {
        if (! \is_subclass_of($action, Action::class)) {
            throw new InvalidNovaActionException('The class provided is not a valid Nova Action.');
        }

        return new MockAction(new $action());
    }
}
