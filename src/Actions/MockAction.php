<?php

namespace JoshGaber\NovaUnit\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use JoshGaber\NovaUnit\MockComponent;
use JoshGaber\NovaUnit\Traits\FieldAssertions;
use Laravel\Nova\Fields\ActionFields;

class MockAction extends MockComponent
{
    use FieldAssertions;

    /**
     * Dispatches the Action, and returns a test handler for the Action response.
     *
     * @param array $fields A set of action fields send to the Action, as a key-value array
     * @param Model|Model[]|Collection $models A set of models sent to the Action
     * @return MockActionResponse A mock class for testing Nova Action responses
     */
    public function handle(array $fields, $models): MockActionResponse
    {
        return new MockActionResponse(
            $this->component->handle(new ActionFields(collect($fields), collect()), collect($models))
        );
    }
}
