<?php


namespace App\Nova\Flexible;


use Laravel\Nova\Fields\KeyValue;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class ProgramPhases extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'program_phases';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'Program Phases';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            KeyValue::make('Phases En')
                ->keyLabel('Phase')
                ->valueLabel('Description')
                ->actionText('Add Phase'),
            KeyValue::make('Phases Ar')
                ->keyLabel('Phase')
                ->valueLabel('Description')
                ->actionText('Add Phase'),
        ];
    }
}
