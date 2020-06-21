<?php

namespace JoshGaber\NovaUnit\Resources;

use JoshGaber\NovaUnit\MockComponent;
use JoshGaber\NovaUnit\Traits\ActionAssertions;
use JoshGaber\NovaUnit\Traits\FieldAssertions;
use JoshGaber\NovaUnit\Traits\FilterAssertions;

class MockResource extends MockComponent
{
    use ActionAssertions, FieldAssertions, FilterAssertions;
}
