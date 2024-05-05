<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FeatureBadge extends Component
{

    public $logo;


    public function __construct($logo)
    {
        $this->logo = $logo;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feature-badge');
    }
}
