<?php

namespace JoshGaber\NovaUnit\Constraints;

use PHPUnit\Framework\Constraint\Constraint;

class ArrayHasInstanceOf extends Constraint
{
    private $class;

    public function __construct(string $class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return \sprintf('contains instance of "%s"', $this->class);
    }

    public function matches($other): bool
    {
        foreach ($other as $field) {
            if ($field instanceof $this->class) {
                return true;
            }
        }

        return false;
    }
}
