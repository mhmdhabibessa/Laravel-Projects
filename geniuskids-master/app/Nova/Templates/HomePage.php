<?php

namespace App\Nova\Templates;

use App\Nova\SeoFields;
use Ebess\AdvancedNovaMediaLibrary\Fields\Media;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use OptimistDigital\NovaPageManager\Template;
use Whitecube\NovaFlexibleContent\Flexible;

class HomePage extends Template
{
    public static $type = 'page';
    public static $name = 'home-page';
    public static $seo = false;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Media::make('Slider Images', 'slider_images')
                ->help('dimensions: 1215x400')
                ->singleMediaRules('required', 'mimes:jpg,jpeg,png', 'max:2000'),

            Text::make('Home Title')->rules('required'),

            Textarea::make('Home Description')->rules('required'),

            Flexible::make('Centre Benefits')->addLayout('Benefit', 'benefit' ,[
                Image::make('Icon'),
                Text::make('Title'),
                Text::make('Url')
            ]),

            Media::make('Preview Images', 'preview_images')
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
}
