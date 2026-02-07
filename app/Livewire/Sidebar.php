<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\Component;

class Sidebar extends Component
{
    public $isOpen = false;

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        $blogCategories = BlogCategory::where('is_active', true)
            ->whereNull('parent_id')
            ->with(['children' => function($query) {
                $query->where('is_active', true)->withCount('publishedBlogs');
            }])
            ->withCount('publishedBlogs')
            ->orderBy('sort_order')
            ->get();

        $recentBlogs = Blog::where('is_published', true)
            ->with('category')
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('livewire.sidebar', compact('blogCategories', 'recentBlogs'));
    }
}