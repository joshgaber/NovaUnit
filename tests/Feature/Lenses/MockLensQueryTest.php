<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Lenses;

use JoshGaber\NovaUnit\Lenses\MockLens;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensQueryTenOrGreater;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensWithFiltersAndOrdering;
use JoshGaber\NovaUnit\Tests\Fixtures\Lenses\LensWithoutFiltersAndOrdering;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\TestCase;

class MockLensQueryTest extends TestCase
{
    public function testItSucceedsIfQueryReturnsMatchingModels()
    {
        $this->usesDatabase();

        $model = new MockModel(['number' => 10]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class);

        $mockLens->query(MockModel::class)->assertContains($model);
    }

    public function testItFailsIfQueryDoesNotReturnMatchingModels()
    {
        $this->usesDatabase()->shouldFail();

        $model = new MockModel(['number' => 9]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class);

        $mockLens->query(MockModel::class)->assertContains($model);
    }

    public function testItSucceedsIfModelMissingFromQueryResult()
    {
        $this->usesDatabase();

        $model = new MockModel(['number' => 9]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class);

        $mockLens->query(MockModel::class)->assertMissing($model);
    }

    public function testItFailsIfModelNotMissingFromQueryResult()
    {
        $this->usesDatabase()->shouldFail();

        $model = new MockModel(['number' => 10]);
        $model->save();

        $mockLens = new MockLens(LensQueryTenOrGreater::class);

        $mockLens->query(MockModel::class)->assertMissing($model);
    }

    public function testItSuccessfullyCountsReturnedRecords()
    {
        $this->usesDatabase();

        for ($i = 0; $i < 3; $i++) {
            (new MockModel(['number' => 10]))->save();
        }

        for ($i = 0; $i < 5; $i++) {
            (new MockModel(['number' => 9]))->save();
        }

        $mockLens = new MockLens(LensQueryTenOrGreater::class);

        $mockLens->query(MockModel::class)->assertCount(3);
    }

    public function testItSucceedsIfQueryCalledWithFilters()
    {
        $this->usesDatabase();

        $mockLens = new MockLens(LensWithFiltersAndOrdering::class);

        $mockLens->query(MockModel::class)->assertWithFilters();
    }

    public function testItFailsIfQueryNotCalledWithFilters()
    {
        $this->usesDatabase()->shouldFail();

        $mockLens = new MockLens(LensWithoutFiltersAndOrdering::class);

        $mockLens->query(MockModel::class)->assertWithFilters();
    }

    public function testItSucceedsIfQueryCalledWithOrdering()
    {
        $this->usesDatabase();

        $mockLens = new MockLens(LensWithFiltersAndOrdering::class);

        $mockLens->query(MockModel::class)->assertWithOrdering();
    }

    public function testItFailsIfQueryNotCalledWithOrdering()
    {
        $this->usesDatabase()->shouldFail();

        $mockLens = new MockLens(LensWithoutFiltersAndOrdering::class);

        $mockLens->query(MockModel::class)->assertWithOrdering();
    }
}
