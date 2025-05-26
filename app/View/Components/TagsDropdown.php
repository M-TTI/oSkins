<?php

namespace App\View\Components;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagsDropdown extends Component
{
    public $tags;

    public function __construct()
    {
        $tags = Tag::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.tags-dropdown');
    }
}
