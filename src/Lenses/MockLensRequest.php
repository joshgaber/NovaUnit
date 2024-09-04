<?php

namespace JoshGaber\NovaUnit\Lenses;

use Laravel\Nova\Http\Requests\LensRequest;

class MockLensRequest extends LensRequest
{
    public $withFilters;
    public $withOrdering;

    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);

        $this->withFilters = false;
        $this->withOrdering = false;
    }

    public function withFilters($query)
    {
        $this->withFilters = true;

        return $query;
    }

    public function withOrdering($query, $defaultCallback = null)
    {
        $this->withOrdering = true;

        return $query;
    }
}
