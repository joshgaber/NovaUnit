<?php

namespace JoshGaber\NovaUnit\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use JoshGaber\NovaUnit\Constraints\EloquentCollectionContains;
use PHPUnit\Framework\Assert as PHPUnit;

class MockFilterQuery
{
    private $results;

    public function __construct(Builder $query)
    {
        $this->results = $query->get();
    }

    /**
     * Assert that the query builder will return the given model.
     *
     * @param  Model  $element  The model contained in the query result
     * @param  string  $message
     * @return $this
     */
    public function assertContains(Model $element, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->results,
            new EloquentCollectionContains($element),
            $message
        );

        return $this;
    }

    /**
     * Assert that the query builder will not return the given model.
     *
     * @param  Model  $element  The model not contained in the query result
     * @param  string  $message
     * @return $this
     */
    public function assertMissing(Model $element, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->results,
            PHPUnit::logicalNot(new EloquentCollectionContains($element)),
            $message
        );

        return $this;
    }

    /**
     * Assert that the query builder returns the given number of records.
     *
     * @param  int  $count
     * @param  string  $message
     * @return $this
     */
    public function assertCount(int $count, string $message = ''): self
    {
        PHPUnit::assertCount($count, $this->results, $message);

        return $this;
    }
}
