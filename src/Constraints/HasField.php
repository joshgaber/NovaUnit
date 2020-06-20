<?php

namespace JoshGaber\NovaUnit\Constraints;

use JoshGaber\NovaUnit\Fields\FieldHelper;
use Laravel\Nova\Fields\Field;
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
        return FieldHelper::findField($other, $this->fieldName, $this->allowPanels) instanceof Field;
    }
}
