<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PictureCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.picture-card');
    }
}
