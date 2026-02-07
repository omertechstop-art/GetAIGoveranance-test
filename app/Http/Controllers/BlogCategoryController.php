<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function show(BlogCategory $category)
    {
        $blogs = Blog::where('blog_category_id', $category->id)
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('userfront.blog-category', compact('category', 'blogs'));
    }

    public function subcategory(BlogCategory $parent, BlogCategory $child)
    {
        $blogs = Blog::where('blog_category_id', $child->id)
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('userfront.blog-subcategory', compact('parent', 'child', 'blogs'));
    }
}