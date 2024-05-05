<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $desc;
    public $pic;
    public $status;
    public $facility;

    public function __construct($title, $desc, $pic, $status, array $facility)
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->pic = $pic;
        $this->status = $status;
        $this->facility = $facility;
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
