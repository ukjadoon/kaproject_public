<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardContent extends Component
{
    /**
     * The heading of the content
     *
     * @var string
     */
    public $heading;

    /**
     * Create a new component instance
     *
     * @param string $heading
     */
    public function __construct(string $heading)
    {
        $this->heading = $heading;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard-content');
    }
}
