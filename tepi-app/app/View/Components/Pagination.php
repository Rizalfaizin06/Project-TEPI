<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $total;
    public $lastpage;
    public $perpage;
    public $currentpage;

    public function __construct($total, $lastpage, $perpage, $currentpage)
    {
        $this->total = $total;
        $this->lastpage = $lastpage;
        $this->perpage = $perpage;
        $this->currentpage = $currentpage;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
