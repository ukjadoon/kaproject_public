<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardError extends Component
{
    /**
     * The error prop
     *
     * @var string
     */
    public $property;

    /**
     * Create a new component instance
     *
     * @param string $heading
     */
    public function __construct(string $property)
    {
        $this->property = $property;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.error');
    }
}
