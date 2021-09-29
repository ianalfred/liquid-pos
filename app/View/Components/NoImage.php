<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NoImage extends Component
{
    public $nameString;

    public $width, $height;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nameString, $width, $height)
    {
        $this->nameString = $nameString;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.no-image');
    }
}
