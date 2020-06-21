<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Traits;

use JoshGaber\NovaUnit\Resources\MockResource;
use JoshGaber\NovaUnit\Tests\Fixtures\Filters\FakeDateFilter;
use JoshGaber\NovaUnit\Tests\Fixtures\Filters\FakeSelectFilter;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceInvalidFieldsAndActions;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceInvalidFieldsetAndActionSet;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceNoFieldsOrActions;
use JoshGaber\NovaUnit\Tests\Fixtures\Resources\ResourceValidFieldsAndActions;
use JoshGaber\NovaUnit\Tests\TestCase;

class FilterAssertionsTest extends TestCase
{
    public function testItSucceedsIfComponentHasNoFilters()
    {
        $mock = new MockResource(new ResourceNoFieldsOrActions(new MockModel));
        $mock->assertHasNoFilters();
    }

    public function testItFailsIfComponentHasFilters()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel));
        $mock->assertHasNoFilters();
    }

    public function testItSucceedsIfAllFiltersAreValid()
    {
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel));
        $mock->assertHasValidFilters();
    }

    public function testItFailsIfAtLeastOneFilterIsNotAValidFilter()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceInvalidFieldsAndActions(new MockModel));
        $mock->assertHasValidFilters();
    }

    public function testItFailsIfNotValidFilterSet()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceInvalidFieldsetAndActionSet(new MockModel));
        $mock->assertHasValidFilters();
    }

    public function testItSucceedsWhenSearchingForFilterByType()
    {
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel));
        $mock->assertHasFilter(FakeSelectFilter::class);
    }

    public function testItFailsWhenFilterNotSetOnComponent()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel));
        $mock->assertHasFilter(FakeDateFilter::class);
    }

    public function testItSucceedsWhenNoFilterMatchesProvidedType()
    {
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel));
        $mock->assertFilterMissing(FakeDateFilter::class);
    }

    public function testItFailsWhenAFilterMatchesProvidedType()
    {
        $this->shouldFail();
        $mock = new MockResource(new ResourceValidFieldsAndActions(new MockModel));
        $mock->assertFilterMissing(FakeSelectFilter::class);
    }
}
