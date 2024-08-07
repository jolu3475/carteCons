<?php

namespace App\View\Components;

use Closure;
use App\Models\Pays;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class filtrer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $pays = Pays::orderBy('nom')->get();
        return view('components.filtrer', compact('pays'));
    }
}
