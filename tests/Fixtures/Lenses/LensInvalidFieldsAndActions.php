<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Lenses;

use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Lenses\Lens;

class LensInvalidFieldsAndActions extends Lens
{
    public static function query(LensRequest $request, $query)
    {
    }

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            new \stdClass(),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            new ActionValidFields(),
            new \stdClass(),
        ];
    }
}
