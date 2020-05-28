<?php

namespace NovaUnit\Tests\Fixtures\Lenses;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;
use NovaUnit\Tests\Fixtures\Actions\ActionValidFields;

class LensInvalidFieldsAndActions extends Lens
{
    public static function query(LensRequest $request, $query)
    {
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Alpha', 'field_alpha'),
            new \stdClass(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new ActionValidFields(),
            new \stdClass(),
        ];
    }
}
