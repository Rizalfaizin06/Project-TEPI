<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardLarge extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $desc;
    public $pic;
    public $groups;
    public $timestart;
    public $timeend;
    public $date;

    public function __construct($title, $desc, $pic, $timestart, $timeend, $date, array $groups)
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->pic = $pic;
        $this->timestart = $timestart;
        $this->timeend = $timeend;
        $this->date = $date;
        $this->groups = $groups;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-large');
    }
}
