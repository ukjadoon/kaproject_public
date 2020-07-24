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
     * The text of the button
     *
     * @var string
     */
    public $buttonText;

    /**
     * The route for the button
     *
     * @var string
     */
    public $buttonRoute;

    /**
     * The route to go back to for the back button
     *
     * @var string
     */
    public $backButtonRoute;

    /**
     * Get a new instance of a component
     *
     * @param string $heading
     * @param string $buttonText
     * @param string $buttonRoute
     * @param string $backButtonRoute
     */
    public function __construct(string $heading, string $buttonText = '', string $buttonRoute = '', string $backButtonRoute = '')
    {
        $this->heading = $heading;
        $this->buttonText = $buttonText;
        $this->buttonRoute = $buttonRoute;
        $this->backButtonRoute = $backButtonRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.dashboard-content');
    }
}
