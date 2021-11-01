<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Titasgailius\SearchRelations\SearchesRelations;

class Student extends Resource
{
    use SearchesRelations;

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Student::class;

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
    public static $title = 'name';

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'guardian' => ['father_name', 'mother_name', 'main_contact', 'emergency_contact', 'email'],
        'schedule' => ['name', 'min_dob', 'level', 'starts_on', 'ends_on']
    ];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'email'
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

            BelongsTo::make('Schedule')->hideWhenUpdating(),

//            Text::make('Student ID', 'student_no')->rules('required'),

            BelongsTo::make('Guardian')->hideWhenUpdating()->hideFromIndex(),

            Text::make('Name'),

            Date::make('D.O.B', 'dob')->format('DD-MM-YYYY'),

            Select::make('Gender')->options([
               'Male' => 'Male',
               'Female' => 'Female'
            ]),

            Text::make('Email'),

            BelongsTo::make('Guardian'),

            BelongsTo::make('Schedule'),

            BelongsTo::make('Purchase Order', 'purchaseOrder'),

            Panel::make('Guardian Details', $this->guardianDetailsPanel())

//            Select::make('Level')->options([
//                '0' => 'Pre',
//                '1' => 'Level 1',
//                '2' => 'Level 2',
//                '3' => 'Level 3',
//                '4' => 'Level 4',
//                '5' => 'Level 5',
//                '6' => 'Level 6',
//            ])->rules('required'),
        ];
    }

    public function guardianDetailsPanel()
    {
        return [
            Text::make('Father Name', function () {
                return $this->guardian->father_name;
            }),
            Text::make('Mother Name', function () {
                return $this->guardian->mother_name;
            }),
            Text::make('Main Contact', function () {
                return $this->guardian->main_contact;
            }),
            Text::make('Emergency Contact', function () {
                return $this->guardian->emergency_contact;
            }),
            Text::make('Email', function () {
                return $this->guardian->email;
            }),
            Text::make('Delivery Address', function () {
                return $this->guardian->delivery_address;
            })->canSee(function () {
                return isset($this->guardian->delivery_address);
            }),
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
