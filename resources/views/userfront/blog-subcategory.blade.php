@extends('layouts.app')

@section('title', $child->name . ' - ' . $parent->name . ' Articles')

@section('hero')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="flex items-center gap-2 text-sm text-gray-600 mb-6">
            <a href="{{ route('blog') }}" class="hover:text-blue-600 transition-colors">Blog</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('blog.category.show', $parent->slug) }}" class="hover:text-blue-600 transition-colors">{{ $parent->name }}</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-blue-600 font-medium">{{ $child->name }}</span>
        </nav>
        
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-2xl mb-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            
            <h1 class="font-playfair text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                {{ $child->name }} <span class="text-blue-600">Articles</span>
            </h1>
            
            <p class="text-base text-gray-600 max-w-3xl mx-auto mb-6">
                {{ $child->description ?? 'Explore articles and insights about ' . $child->name . ' in ' . $parent->name . '.' }}
            </p>
            
            <div class="flex items-center justify-center gap-4 text-sm">
                <div class="flex items-center gap-2 bg-white px-5 py-2 rounded-full shadow-md">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="font-semibold text-gray-900">{{ $blogs->total() }}</span>
                    <span class="text-gray-600">Articles</span>
                </div>
                <div class="flex items-center gap-2 bg-white px-5 py-2 rounded-full shadow-md">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span class="text-gray-600">{{ $parent->name }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($blogs as $blog)
        <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
            <div class="relative">
                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                @if($blog->category)
                <span class="absolute top-4 left-4 text-sm font-medium text-blue-600 bg-white px-3 py-1 rounded-full">{{ $blog->category->name }}</span>
                @endif
            </div>
            <div class="p-6">
                <p class="text-sm text-gray-500 mb-3">{{ $blog->published_at ? $blog->published_at->format('M j, Y') : $blog->created_at->format('M j, Y') }}</p>
                <h3 class="font-futura text-sm font-bold text-gray-900 mb-4">{{ $blog->title }}</h3>
                <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors">
                    <span>Read More</span>
                    <svg width="14" height="14" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center py-12 text-gray-500">
            No articles found in this subcategory yet.
        </div>
        @endforelse
    </div>
    
    @if($blogs->hasPages())
    <div class="mt-12">
        {{ $blogs->links() }}
    </div>
    @endif
</div>

<!-- Related Articles -->
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Related Articles from {{ $parent->name }}</h2>
            <a href="{{ route('blog.category.show', $parent->slug) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                View All →
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $relatedBlogs = \App\Models\Blog::where('blog_category_id', $parent->id)
                    ->where('is_published', true)
                    ->inRandomOrder()
                    ->take(3)
                    ->get();
            @endphp
            @foreach($relatedBlogs as $relatedBlog)
            <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                <div class="relative">
                    <img src="{{ $relatedBlog->featured_image_url ?? $relatedBlog->featured_image }}" alt="{{ $relatedBlog->title }}" class="w-full h-48 object-cover">
                    @if($relatedBlog->category)
                    <span class="absolute top-4 left-4 text-sm font-medium text-blue-600 bg-white px-3 py-1 rounded-full">{{ $relatedBlog->category->name }}</span>
                    @endif
                </div>
                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-3">{{ $relatedBlog->published_at ? $relatedBlog->published_at->format('M j, Y') : $relatedBlog->created_at->format('M j, Y') }}</p>
                    <h3 class="text-sm font-bold text-gray-900 mb-4 line-clamp-2">{{ $relatedBlog->title }}</h3>
                    <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors">
                        <span>Read More</span>
                        <svg width="14" height="14" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endsection