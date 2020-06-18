<?php

namespace JoshGaber\NovaUnit\Constraints;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Panel;
use PHPUnit\Framework\Constraint\Constraint;

class HasField extends Constraint
{
    private $fieldName;
    private $allowPanels;

    public function __construct(string $fieldName, bool $allowPanels = false)
    {
        $this->fieldName = $fieldName;
        $this->allowPanels = $allowPanels;
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
            if ($this->allowPanels && $field instanceof Panel) {
                if ($this->matches($field->data)) {
                    return true;
                }
            } elseif ($field instanceof Field) {
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
