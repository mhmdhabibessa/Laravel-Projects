<?php


namespace App\Nova\Flexible;


use Laravel\Nova\Fields\Textarea;
use Spatie\Translatable\HasTranslations;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextDescription extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'text_description';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'Text Description';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Textarea::make('Body En')->rules('required'),
            Textarea::make('Body Ar')->rules('required')
        ];
    }
}
