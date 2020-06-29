<?php

namespace App\View\Components;

use App\Letter;
use Illuminate\View\Component;

class LetterMenu extends Component
{
    public $letters;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->letters = Letter::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.letter-menu');
    }
}
