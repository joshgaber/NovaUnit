<?php

namespace JoshGaber\NovaUnit\Traits;

use Illuminate\Http\Request;
use JoshGaber\NovaUnit\Constraints\ArrayHasInstanceOf;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;

trait FilterAssertions
{
    /**
     * Asserts that this component has the specified field.
     *
     * @param  string  $action  The class path of the Filter
     * @param  string  $message
     * @return $this
     */
    public function assertHasFilter(string $action, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->filters(NovaRequest::createFromGlobals()),
            new ArrayHasInstanceOf($action),
            $message
        );

        return $this;
    }

    /**
     * Asserts that this component does not have the specified field.
     *
     * @param  string  $action  The class path of the Filter
     * @param  string  $message
     * @return $this
     */
    public function assertFilterMissing(string $action, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->filters(NovaRequest::createFromGlobals()),
            PHPUnit::logicalNot(new ArrayHasInstanceOf($action)),
            $message
        );

        return $this;
    }

    /**
     * Asserts that this component has no Filters specified.
     *
     * @param  string  $message
     * @return $this
     */
    public function assertHasNoFilters(string $message = ''): self
    {
        PHPUnit::assertCount(0, $this->component->filters(Request::createFromGlobals()), $message);

        return $this;
    }

    /**
     * Asserts that all filters on this component are valid Filters.
     *
     * @param  string  $message
     * @return $this
     */
    public function assertHasValidFilters(string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->filters(NovaRequest::createFromGlobals()),
            PHPUnit::logicalAnd(
                new IsType(IsType::TYPE_ARRAY),
                new TraversableContainsOnly(Filter::class, false)
            ),
            $message
        );

        return $this;
    }
}
