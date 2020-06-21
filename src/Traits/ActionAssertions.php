<?php

namespace JoshGaber\NovaUnit\Traits;

use Illuminate\Http\Request;
use JoshGaber\NovaUnit\Actions\ActionNotFoundException;
use JoshGaber\NovaUnit\Actions\MockActionElement;
use JoshGaber\NovaUnit\Constraints\ArrayHasInstanceOf;
use Laravel\Nova\Actions\Action;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;

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
        PHPUnit::assertCount(0, $this->component->actions(Request::createFromGlobals()), $message);

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
            $this->component->actions(Request::createFromGlobals()),
            PHPUnit::logicalAnd(
                new IsType(IsType::TYPE_ARRAY),
                new TraversableContainsOnly(Action::class, false)
            ),
            $message
        );

        return $this;
    }

    /**
     * Searches for a matching action instance on this component for testing.
     *
     * @param string $actionType The class name of the Action
     * @return MockActionElement
     * @throws ActionNotFoundException
     */
    public function action(string $actionType): MockActionElement
    {
        $actions = array_filter(
            $this->component->actions(Request::createFromGlobals()),
            function ($a) use ($actionType) {
                return $a instanceof $actionType;
            }
        );

        if (count($actions) === 0) {
            throw new ActionNotFoundException();
        }

        return new MockActionElement(array_shift($actions));
    }
}
