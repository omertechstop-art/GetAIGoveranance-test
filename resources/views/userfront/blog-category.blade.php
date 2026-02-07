@extends('layouts.app')

@section('title', $category->name . ' - Blog Articles')

@section('hero')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-6">
    <div class="text-center mb-6">
        <h1 class="font-playfair text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            {{ $category->name }} <span class="text-blue-600">Articles</span>
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            {{ $category->description ?? 'Latest insights and articles about ' . $category->name . '.' }}
        </p>
    </div>
</div>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($blogs as $blog)
        <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
            <div class="relative">
                <img src="{{ $blog->featured_image_url ?? $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
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
            No articles found in this category yet.
        </div>
        @endforelse
    </div>
    
    @if($blogs->hasPages())
    <div class="mt-12">
        {{ $blogs->links() }}
    </div>
    @endif
</div>
@endsection