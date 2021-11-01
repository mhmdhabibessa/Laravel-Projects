<?php

namespace App\Nova\Templates;

use App\Nova\PageHeaderFields;
use App\Nova\SeoFields;
use Ebess\AdvancedNovaMediaLibrary\Fields\Media;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Panel;
use OptimistDigital\NovaPageManager\Template;
use Whitecube\NovaFlexibleContent\Flexible;

class AboutPage extends Template
{
    public static $type = 'page';
    public static $name = 'about-page';
    public static $seo = false;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Panel::make('Page Header Fields', $this->pageHeader()),

            Text::make('First Title'),

            Textarea::make('First Description'),

            Flexible::make('Content')
                ->addLayout('Block with Text', 'block_with_text', [
                    Text::make('Title'),
                    Trix::make('Body')
                ]),

            Panel::make('SEO Fields', $this->seoFields())
        ];
    }

    protected function pageHeader() {
        return [
            Text::make('Header Title')
                ->rules('required')
                ->hideFromIndex(),

            Media::make('Page Header', 'page_header')
                ->help('dimensions: 1215xx400')
                ->singleMediaRules(['required', 'mimes:png,jpg,jpeg', 'max:2000']),
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
