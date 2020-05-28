<?php

namespace NovaUnit\Constraints;

use Laravel\Nova\Actions\Action;
use PHPUnit\Framework\Constraint\Constraint;

class IsActionResponseType extends Constraint
{
    private $actionType;

    public function __construct($actionType)
    {
        $this->actionType = $actionType;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return \sprintf('matches the "%s" Action response', $this->actionType);
    }

    public function matches($response): bool
    {
        $structure = \array_keys(\call_user_func([Action::class, $this->actionType], 'param 1', 'param 2'));
        $responseKeys = \array_keys($response);

        \sort($structure);
        \sort($responseKeys);

        return $structure === $responseKeys;
    }
}
