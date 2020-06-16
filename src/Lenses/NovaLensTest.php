<?php

namespace JoshGaber\NovaUnit\Lenses;

use Laravel\Nova\Lenses\Lens;

trait NovaLensTest
{
    /**
     * Initialize the Nova Action mock.
     *
     * @param string $lens The class path of the Lens
     * @param string $model The model used for making query assertions
     * @return MockLens The Lens mock instance
     * @throws InvalidNovaLensException If the supplied action class is not a Nova Lens
     */
    public static function novaLens(string $lens, ?string $model = null): MockLens
    {
        if (! \is_subclass_of($lens, Lens::class)) {
            throw new InvalidNovaLensException();
        }

        return new MockLens(new $lens(), $model);
    }
}
