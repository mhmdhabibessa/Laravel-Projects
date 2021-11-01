<?php

namespace App\Nova;

use App\Nova\Actions\LinkToEnrollButton;
use App\Nova\Flexible\Benefits;
use App\Nova\Flexible\Faqs;
use App\Nova\Flexible\ProgramPhases;
use App\Nova\Flexible\TextDescription;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Ebess\AdvancedNovaMediaLibrary\Fields\Media;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class Course extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Course::class;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Classes';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
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
            HasMany::make('Schedules'),

            ID::make()->sortable(),

            Media::make('Page Header', 'page_header')
                ->help('dimensions: 1215x400')
                ->singleMediaRules(['required', 'mimes:png,jpg,jpeg', 'max:2000']),

            Media::make('Course Thumb', 'course_thumb')
                ->help('dimensions: 400x400')
                ->singleMediaRules(['required', 'mimes:png,jpg,jpeg', 'max:2000']),

            TextWithSlug::make('Name')
                ->translatable()
                ->slug('slug'),

            Slug::make('Slug')->disableAutoUpdateWhenUpdating(),

            Flexible::make('Content')
                ->fullWidth()
                ->addLayout(TextDescription::class)
                ->addLayout(ProgramPhases::class)
                ->addLayout(Faqs::class)
                ->addLayout(Benefits::class),

            Media::make('Featured Images', 'featured_images')
            ->singleMediaRules('required', 'mimes:jpg,jpeg,png', 'max:2000'),

            Panel::make('SEO Fields', $this->seoFields())
        ];
    }

    protected function seoFields() {
        return [
            Text::make('Meta Title')
                ->help('Text will be appended after Genius Kids |')
                ->hideFromIndex(),

            Textarea::make('Meta Description')
                ->alwaysShow()
                ->hideFromIndex(),

            Text::make('OG Title')
                ->hideFromIndex(),

            Textarea::make('OG Description')
                ->alwaysShow()
                ->hideFromIndex()
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
        return [
            (new LinkToEnrollButton())->onlyOnDetail()->withoutConfirmation()
        ];
    }
}
