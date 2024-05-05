<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $body;
    public $feature;

    public function __construct($title, $body, $feature)
    {
        $this->title = $title;
        $this->body = $body;
        $this->feature = $feature;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
