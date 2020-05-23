<?php

namespace NovaUnit;

abstract class MockComponent
{
    protected $component;

    public function __construct($component)
    {
        $this->component = $component;
    }
}
