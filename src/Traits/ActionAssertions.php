<?php

namespace NovaUnit\Traits;

use Illuminate\Http\Request;
use NovaUnit\Constraints\ArrayHasInstanceOf;
use NovaUnit\Constraints\HasValidFields;
use PHPUnit\Framework\Assert as PHPUnit;

trait ActionAssertions
{
    /**
     * Asserts that this component has the specified field.
     *
     * @param string $action The class path of the Action
     * @param string $message
     * @return $this
     */
    public function assertHasAction(string $action, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->actions(Request::createFromGlobals()),
            new ArrayHasInstanceOf($action),
            $message
        );

        return $this;
    }

    /**
     * Asserts that this component does not have the specified field.
     *
     * @param string $action The class path of the Action
     * @param string $message
     * @return $this
     */
    public function assertActionMissing(string $action, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->actions(Request::createFromGlobals()),
            PHPUnit::logicalNot(new ArrayHasInstanceOf($action)),
            $message
        );

        return $this;
    }

    /**
     * Asserts that this component has no Actions specified.
     *
     * @param string $message
     * @return $this
     */
    public function assertHasNoActions(string $message = ''): self
    {
        PHPUnit::assertCount(0, $this->component->fields(Request::createFromGlobals()), $message);

        return $this;
    }

    /**
     * Asserts that all actions on this component are valid Actions.
     *
     * @param string $message
     * @return $this
     */
    public function assertHasValidActions(string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->fields(Request::createFromGlobals()),
            new HasValidFields(),
            $message
        );

        return $this;
    }
}
