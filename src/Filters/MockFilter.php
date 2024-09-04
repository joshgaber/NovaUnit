<?php

namespace JoshGaber\NovaUnit\Filters;

use Illuminate\Database\Eloquent\Model;
use JoshGaber\NovaUnit\Exceptions\InvalidModelException;
use JoshGaber\NovaUnit\MockComponent;
use Laravel\Nova\Filters\BooleanFilter;
use Laravel\Nova\Filters\DateFilter;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\TraversableContainsEqual;

class MockFilter extends MockComponent
{
    /**
     * Assert that the subject filter is a select filter.
     *
     * @param  string  $message
     * @return $this
     */
    public function assertSelectFilter(string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component,
            PHPUnit::logicalAnd(
                new IsInstanceOf(Filter::class),
                PHPUnit::logicalNot(new IsInstanceOf(BooleanFilter::class)),
                PHPUnit::logicalNot(new IsInstanceOf(DateFilter::class))
            ),
            $message
        );

        return $this;
    }

    /**
     * Assert that the subject filter is a boolean filter.
     *
     * @param  string  $message
     * @return $this
     */
    public function assertBooleanFilter(string $message = ''): self
    {
        PHPUnit::assertInstanceOf(BooleanFilter::class, $this->component, $message);

        return $this;
    }

    /**
     * Assert that the subject filter is a date filter.
     *
     * @param  string  $message
     * @return $this
     */
    public function assertDateFilter(string $message = ''): self
    {
        PHPUnit::assertInstanceOf(DateFilter::class, $this->component, $message);

        return $this;
    }

    /**
     * Assert that the filter has the given option.
     *
     * @param  string  $option  The key or value of the option
     * @param  string  $message
     * @return $this
     */
    public function assertHasOption(string $option, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->options(NovaRequest::createFromGlobals()),
            PHPUnit::logicalOr(
                new ArrayHasKey($option),
                new TraversableContainsEqual($option)
            ),
            $message
        );

        return $this;
    }

    /**
     * Assert that the filter does not have the given option.
     *
     * @param  string  $option  The key or value of the option
     * @param  string  $message
     * @return $this
     */
    public function assertOptionMissing(string $option, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->options(NovaRequest::createFromGlobals()),
            PHPUnit::logicalNot(
                PHPUnit::logicalOr(
                    new ArrayHasKey($option),
                    new TraversableContainsEqual($option)
                )
            ),
            $message
        );

        return $this;
    }

    /**
     * Apply the filter with the provided value and allow tests on the result.
     *
     * @param  string  $model  The model that the filter should be applied to
     * @param  mixed|array  $value  The value returned by the filter
     * @return MockFilterQuery
     *
     * @throws InvalidModelException If the class provided is not a valid model class
     */
    public function apply(string $model, $value): MockFilterQuery
    {
        if (! is_subclass_of($model, Model::class)) {
            throw new InvalidModelException();
        }

        return new MockFilterQuery(
            $this->component->apply(NovaRequest::createFromGlobals(), $model::query(), $value)
        );
    }
}
