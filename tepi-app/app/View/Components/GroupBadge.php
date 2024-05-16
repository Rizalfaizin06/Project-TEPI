<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GroupBadge extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $text;


    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.group-badge');
    }
}
