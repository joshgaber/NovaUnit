<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Resources;

use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionNoFields;
use JoshGaber\NovaUnit\Tests\Fixtures\Actions\ActionValidFields;
use JoshGaber\NovaUnit\Tests\Fixtures\MockModel;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class ResourceForActionTests extends Resource
{
    public static $model = MockModel::class;

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Alpha', 'field_alpha')
                ->rules('max:128'),
            Number::make('Beta', 'field_beta')
                ->showOnIndex()->showOnDetail()->showOnCreating()->showOnUpdating(),
            Number::make('Gamma', 'field_gamma')
                ->hideFromIndex()->hideFromDetail()->hideWhenCreating()->hideWhenUpdating(),
            Text::make('Delta', 'field_delta')
                ->nullable()->sortable(),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            (new ActionValidFields())->onlyOnDetail(),
            (new ActionNoFields())->exceptOnDetail(),
        ];
    }
}
