<?php

namespace JoshGaber\NovaUnit\Resources;

use JoshGaber\NovaUnit\MockComponent;
use JoshGaber\NovaUnit\Traits\ActionAssertions;
use JoshGaber\NovaUnit\Traits\FieldAssertions;

class MockResource extends MockComponent
{
    use ActionAssertions, FieldAssertions;
}
