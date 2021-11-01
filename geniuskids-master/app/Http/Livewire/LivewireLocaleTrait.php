<?php

namespace App\Http\Livewire;


trait LivewireLocaleTrait
{
    public $livewireLocale;

    public function mount()
    {
        $this->livewireLocale = app()->getLocale();
    }
}
