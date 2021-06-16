<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Quickstart extends Component
{
    public $appName;
    public $appUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($appName, $appUrl)
    {
        $this->appName = $appName;
        $this->appUrl = $appUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.quickstart');
    }
}
