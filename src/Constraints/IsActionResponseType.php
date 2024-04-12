<?php

namespace JoshGaber\NovaUnit\Constraints;

use Laravel\Nova\Actions\Action;
use PHPUnit\Framework\Constraint\Constraint;

class IsActionResponseType extends Constraint
{
    private $actionResponse;
    private $actionType;

    public function __construct($actionType, $actionResponse)
    {
        $this->actionResponse = $actionResponse;
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
        if (is_array($this->actionResponse)) {
            $structure = \array_keys(\call_user_func([Action::class, $this->actionType], 'param 1', 'param 2'));
            $responseKeys = \array_keys($response);

            \sort($structure);
            \sort($responseKeys);

            return $structure === $responseKeys;
        }

        return $this->actionResponse->offsetExists($this->actionType);
    }
}
