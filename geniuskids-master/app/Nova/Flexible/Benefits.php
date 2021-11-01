<?php

namespace App\Nova\Flexible;

use Laravel\Nova\Fields\KeyValue;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Benefits extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'benefits';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'Benefits';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            KeyValue::make('Benefits En')
                ->keyLabel('Benefit')
                ->valueLabel('Description')
                ->actionText('Add Benefit'),
            KeyValue::make('Benefits Ar')
                ->keyLabel('Benefit')
                ->valueLabel('Description')
                ->actionText('Add Benefit'),
        ];
    }
}
