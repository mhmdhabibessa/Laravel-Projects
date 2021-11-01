<?php


namespace App\Nova\Flexible;


use Laravel\Nova\Fields\KeyValue;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Faqs extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'faqs';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'FAQs';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            KeyValue::make('Questions En')
                ->keyLabel('Question')
                ->valueLabel('Answer')
                ->actionText('Add Question'),
            KeyValue::make('Questions Ar')
                ->keyLabel('Question')
                ->valueLabel('Answer')
                ->actionText('Add Question'),
        ];
    }
}
