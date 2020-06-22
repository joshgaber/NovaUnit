<?php

namespace JoshGaber\NovaUnit\Lenses;

use Illuminate\Database\Eloquent\Model;
use JoshGaber\NovaUnit\Constraints\EloquentCollectionContains;
use JoshGaber\NovaUnit\Exceptions\InvalidModelException;
use JoshGaber\NovaUnit\MockComponent;
use JoshGaber\NovaUnit\Traits\ActionAssertions;
use JoshGaber\NovaUnit\Traits\FieldAssertions;
use JoshGaber\NovaUnit\Traits\FilterAssertions;
use PHPUnit\Framework\Assert as PHPUnit;

class MockLens extends MockComponent
{
    use ActionAssertions, FieldAssertions, FilterAssertions;

    public $model;

    public function __construct($component, $model = null)
    {
        parent::__construct($component);
        $this->model = $model;
    }

    /**
     * Assert that the query builder will return the given model.
     *
     * @deprecated
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
     * @deprecated
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
     * @deprecated
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
     * @deprecated
     *
     * @param string $message
     * @return $this
     */
    public function assertQueryWithOrdering(string $message = ''): self
    {
        $request = new MockLensRequest();
        $this->component::query($request, $this->model::query());
        PHPUnit::assertTrue($request->withOrdering, $message);

        return $this;
    }

    /**
     * Apply lens query and test the response.
     *
     * @param string|null $model
     * @return MockLensQuery
     * @throws InvalidModelException
     */
    public function query(?string $model = null): MockLensQuery
    {
        if (! is_subclass_of($model, Model::class) && ! is_subclass_of($this->model, Model::class)) {
            throw new InvalidModelException();
        }

        $query = ($model ?? $this->model)::query();
        $request = new MockLensRequest();

        return new MockLensQuery(
            $this->component::query($request, $query),
            $request
        );
    }
}
