<?php

use Illuminate\Support\Facades\Route;
use App\Models\MarketplaceCategory;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    $categories = MarketplaceCategory::where('is_active', true)
        ->whereNull('parent_id')
        ->with('children')
        ->orderBy('sort_order')
        ->get();
    
    return view('userfront.home', compact('categories'));
})->name('home');

Route::get('/categories', function () {
    return view('userfront.categories');
})->name('categories');

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{parent:slug}/{child:slug}', [CategoryController::class, 'subcategory'])->name('category.subcategory');

Route::get('/blog', function () {
    $featuredBlogs = \App\Models\Blog::with('category')
        ->where('is_published', true)
        ->where('is_featured', true)
        ->orderBy('published_at', 'desc')
        ->take(3)
        ->get();
    
    $blogs = \App\Models\Blog::with('category')
        ->where('is_published', true)
        ->orderBy('published_at', 'desc')
        ->take(15)
        ->get()
        ->reject(function($blog) use ($featuredBlogs) {
            return $featuredBlogs->contains('id', $blog->id);
        });
    
    $subcategories = \App\Models\BlogCategory::where('is_active', true)
        ->whereNotNull('parent_id')
        ->orderBy('sort_order')
        ->get();
    
    return view('userfront.blog', compact('blogs', 'subcategories', 'featuredBlogs'));
})->name('blog');

Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category:slug}', [BlogCategoryController::class, 'show'])->name('blog.category.show');
Route::get('/blog/category/{parent:slug}/{child:slug}', [BlogCategoryController::class, 'subcategory'])->name('blog.category.subcategory');

Route::get('/compare', function () {
    return view('userfront.compare');
})->name('compare');

Route::get('/qa', function () {
    return view('userfront.qa');
})->name('qa');

Route::get('/api/blogs', function () {
    $offset = request('offset', 0);
    $blogs = \App\Models\Blog::with('category')
        ->where('is_published', true)
        ->orderBy('published_at', 'desc')
        ->skip($offset)
        ->take(15)
        ->get();
    
    return response()->json(['blogs' => $blogs]);
});
