<?php

namespace JoshGaber\NovaUnit\Constraints;

use Laravel\Nova\Fields\Field;
use PHPUnit\Framework\Constraint\Constraint;

class HasValidFields extends Constraint
{
    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return 'contains valid fields only';
    }

    public function matches($other): bool
    {
        if (! \is_array($other)) {
            return false;
        }

        foreach ($other as $field) {
            if (! $field instanceof Field) {
                return false;
            }
        }

        return true;
    }
}
