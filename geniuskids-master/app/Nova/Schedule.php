<?php

namespace App\Nova;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Laraning\NovaTimeField\TimeField;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Titasgailius\SearchRelations\SearchesRelations;
use Whitecube\NovaFlexibleContent\Flexible;

class Schedule extends Resource
{
    use SearchesRelations;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Schedule::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Classes';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'min_dob', 'level', 'starts_on', 'ends_on', 'max_dob'
    ];

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'student' => ['name', 'email'],
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Course'),

            Text::make('Name')
                ->rules('required')
                ->translatable(),

            Date::make('Minimum Date of Birth', 'min_dob')
                ->rules('required', 'date'),

            Date::make('Maximum Date of Birth', 'max_dob')
                ->rules('required', 'date', 'after:min_dob'),

            Select::make('Level')->options([
                '0' => 'Pre',
                '1' => 'Level 1',
                '2' => 'Level 2',
                '3' => 'Level 3',
                '4' => 'Level 4',
                '5' => 'Level 5',
                '6' => 'Level 6',
            ])->rules('required'),

            Number::make('Max Students')
                ->rules('required', 'numeric'),

            Number::make('Booked Students')
                ->exceptOnForms(),

            Date::make('Starts On')->rules('required'),

            Date::make('Ends On')->rules('required', 'after:starts_on'),

            Flexible::make('Days of Week')->addLayout('Slots', 'slots', [
                Select::make('Day')->options([
                    'Saturday' => 'Saturday',
                    "Sunday" => "Sunday",
                    "Monday" => "Monday",
                    "Tuesday" => "Tuesday",
                    "Wednesday" => "Wednesday",
                    "Thursday" => "Thursday",
                    "Friday" => "Friday"
                ])->rules('required'),
                TimeField::make('Starting Time')->rules('required'),
                TimeField::make('Ending Time')->rules('required')
            ])->button('Add Time Slot'),

            Currency::make('Price')->rules('required'),

            Boolean::make('Active'),

            HasMany::make('Students')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
