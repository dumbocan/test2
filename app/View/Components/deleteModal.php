<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class deleteModal extends Component
{
    public $id;
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($id,$name,)
    {
        $this->name = $name;
        $this->id = $id;
    }


    public function render(): View|Closure|string
    {
        return view('components.deleteModal');
    }
}
