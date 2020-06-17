<?php

namespace JoshGaber\NovaUnit\Constraints;

use Laravel\Nova\Actions\Action;
use PHPUnit\Framework\Constraint\Constraint;

class HasValidActions extends Constraint
{
    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return 'contains valid actions only';
    }

    public function matches($other): bool
    {
        if (! \is_array($other)) {
            return false;
        }

        foreach ($other as $action) {
            if (! $action instanceof Action) {
                return false;
            }
        }

        return true;
    }
}
