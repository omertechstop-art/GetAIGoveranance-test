<?php

namespace App\Livewire;

use App\Models\MarketplaceCategory;
use App\Models\BlogCategory;
use Livewire\Component;

class MegaMenu extends Component
{
    public $type;
    public $title;
    
    public function mount($type, $title)
    {
        $this->type = $type;
        $this->title = $title;
    }
    
    public function render()
    {
        $categories = [];
        
        if ($this->type === 'categories') {
            $categories = MarketplaceCategory::whereNull('parent_id')
                ->with('children')
                ->orderBy('sort_order', 'asc')
                ->get();
        } else {
            $categories = BlogCategory::whereNull('parent_id')
                ->with('children')
                ->orderBy('sort_order', 'asc')
                ->get();
        }
        
        return view('livewire.mega-menu', compact('categories'));
    }
}