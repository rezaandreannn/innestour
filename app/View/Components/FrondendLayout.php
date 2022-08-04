<?php

namespace App\View\Components;

use App\Models\Wisata;
use Illuminate\View\Component;

class FrondendLayout extends Component
{


    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        // $wisatas = Wisata::orderBy('id', 'desc')->get()->limit(6);

        // dd($wisatas);
        return view('layouts.frondend');
    }
}
