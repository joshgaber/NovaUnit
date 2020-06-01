<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Lenses;

use JoshGaber\NovaUnit\Lenses\MockLens;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensQueryTenOrGreater;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensWithFiltersAndOrdering;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensWithoutFiltersAndOrdering;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\TestCase;

class MockLensTest extends TestCase
{
    public function testItSucceedsIfQueryReturnsMatchingModels()
    {
        $this->usesDatabase();

        $model = new MockModel(['number' => 10]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class, MockModel::class);

        $mockLens->assertQueryContains($model);
    }

    public function testItFailsIfQueryDoesNotReturnMatchingModels()
    {
        $this->usesDatabase()->shouldFail();

        $model = new MockModel(['number' => 9]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class, MockModel::class);

        $mockLens->assertQueryContains($model);
    }

    public function testItSucceedsIfModelMissingFromQueryResult()
    {
        $this->usesDatabase();

        $model = new MockModel(['number' => 9]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class, MockModel::class);

        $mockLens->assertQueryMissing($model);
    }

    public function testItFailsIfModelNotMissingFromQueryResult()
    {
        $this->usesDatabase()->shouldFail();

        $model = new MockModel(['number' => 10]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class, MockModel::class);

        $mockLens->assertQueryMissing($model);
    }

    public function testItSucceedsIfQueryCalledWithFilters()
    {
        $mockLens = new MockLens(LensWithFiltersAndOrdering::class, MockModel::class);

        $mockLens->assertQueryWithFilters();
    }

    public function testItFailsIfQueryNotCalledWithFilters()
    {
        $this->shouldFail();

        $mockLens = new MockLens(LensWithoutFiltersAndOrdering::class, MockModel::class);

        $mockLens->assertQueryWithFilters();
    }

    public function testItSucceedsIfQueryCalledWithOrdering()
    {
        $mockLens = new MockLens(LensWithFiltersAndOrdering::class, MockModel::class);

        $mockLens->assertQueryWithOrdering();
    }

    public function testItFailsIfQueryNotCalledWithOrdering()
    {
        $this->shouldFail();

        $mockLens = new MockLens(LensWithoutFiltersAndOrdering::class, MockModel::class);

        $mockLens->assertQueryWithOrdering();
    }
}
