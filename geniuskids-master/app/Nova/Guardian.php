<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Titasgailius\SearchRelations\SearchesRelations;

class Guardian extends Resource
{
    use SearchesRelations;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Guardian::class;

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Students';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'father_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'father_name', 'mother_name', 'main_contact', 'emergency_contact', 'email'
    ];

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'students' => ['name', 'email'],
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            BelongsTo::make('City')->rules('required'),

            Text::make('Father Name')->rules('required', 'min:3', 'max:255'),

            Text::make('Mother Name')->rules('required', 'min:3', 'max:255'),

            Text::make('Main Contact')->rules('required', 'numeric', 'starts_with:00'),

            Text::make('Emergency Contact')->rules('required', 'numeric', 'starts_with:00'),

            Text::make('Email')
                ->rules('required')
                ->creationRules('unique:guardians,email')
                ->updateRules('unique:guardians,email,{{resourceId}}'),

            Text::make('Delivery Address')
                ->canSee(function () {
                    return isset($this->delivery_address);
                })
                ->onlyOnDetail(),

            HasMany::make('Students')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
