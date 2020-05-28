<?php

namespace NovaUnit\Resources;

use NovaUnit\MockComponent;
use NovaUnit\Traits\ActionAssertions;
use NovaUnit\Traits\FieldAssertions;

class MockResource extends MockComponent
{
    use ActionAssertions, FieldAssertions;
}
