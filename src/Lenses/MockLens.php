<?php

namespace JoshGaber\NovaUnit\Lenses;

use Illuminate\Database\Eloquent\Model;
use JoshGaber\NovaUnit\Constraints\EloquentCollectionContains;
use JoshGaber\NovaUnit\MockComponent;
use JoshGaber\NovaUnit\Traits\ActionAssertions;
use JoshGaber\NovaUnit\Traits\FieldAssertions;
use PHPUnit\Framework\Assert as PHPUnit;

class MockLens extends MockComponent
{
    use ActionAssertions, FieldAssertions;

    public $model;

    public function __construct($component, $model)
    {
        parent::__construct($component);
        $this->model = $model;
    }

    /**
     * Assert that the query builder will return the given model.
     *
     * @param Model $element The model contained in the query result
     * @param string $message
     * @return $this
     */
    public function assertQueryContains(Model $element, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component::query(new MockLensRequest(), $this->model::query())->get(),
            new EloquentCollectionContains($element),
            $message
        );

        return $this;
    }

    /**
     * Assert that the query builder will not return the given model.
     *
     * @param Model $element The model not contained in the query result
     * @param string $message
     * @return $this
     */
    public function assertQueryMissing(Model $element, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component::query(new MockLensRequest(), $this->model::query())->get(),
            PHPUnit::logicalNot(new EloquentCollectionContains($element)),
            $message
        );

        return $this;
    }

    /**
     * Assert that the query builder uses the "withFilters" request.
     *
     * @param string $message
     * @return $this
     */
    public function assertQueryWithFilters(string $message = ''): self
    {
        $request = new MockLensRequest();
        $this->component::query($request, $this->model::query());
        PHPUnit::assertTrue($request->withFilters, $message);

        return $this;
    }

    /**
     * Assert that the query builder uses the "withOrdering" request.
     *
     * @param string $message
     * @return $this
     */
    public function assertQueryWithOrdering(string $message = '')
    {
        $request = new MockLensRequest();
        $this->component::query($request, $this->model::query());
        PHPUnit::assertTrue($request->withOrdering, $message);

        return $this;
    }
}
