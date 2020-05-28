<?php

namespace NovaUnit\Constraints;

use Laravel\Nova\Fields\Field;
use PHPUnit\Framework\Constraint\Constraint;

class HasField extends Constraint
{
    private $fieldName;

    public function __construct(string $fieldName)
    {
        $this->fieldName = $fieldName;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return \sprintf('contains field "%s"', $this->fieldName);
    }

    public function matches($other): bool
    {
        foreach ($other as $field) {
            if ($field instanceof Field) {
                if (
                    $field->attribute === $this->fieldName ||
                    \mb_strtolower($field->name) === \mb_strtolower($this->fieldName)
                ) {
                    return true;
                }
            }
        }

        return false;
    }
}
