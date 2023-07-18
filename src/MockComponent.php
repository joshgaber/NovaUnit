<?php

namespace JoshGaber\NovaUnit;

abstract class MockComponent
{
    public $component;

    public function __construct($component)
    {
        $this->component = $component;
    }
}
