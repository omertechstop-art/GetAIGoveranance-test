@extends('layouts.app')

@section('title', $blog->meta_title ?? $blog->title . ' | GetAIGovernance')

@section('hero')
<!-- Hero Section -->
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-sm text-gray-600 mb-6">
            <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
            <span>/</span>
            <a href="{{ route('blog') }}" class="hover:text-blue-600">Blog</a>
            @if($blog->category)
            <span>/</span>
            <a href="{{ route('blog.category.show', $blog->category->slug) }}" class="hover:text-blue-600">{{ $blog->category->name }}</a>
            @endif
        </nav>
        
        <!-- Hero Content -->
        <div class="flex flex-col lg:flex-row gap-8 items-center">
            <!-- Content Left -->
            <div class="w-full lg:w-1/2">
                @if($blog->category)
                <a href="{{ route('blog.category.show', $blog->category->slug) }}" class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 hover:text-blue-700 mb-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    {{ $blog->category->name }}
                </a>
                @endif
                
                <h1 class="font-playfair text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    {{ $blog->title }}
                </h1>
                
                @if($blog->excerpt)
                <p class="text-lg text-gray-600 mb-4">
                    {{ $blog->excerpt }}
                </p>
                @endif
                
                <div class="text-sm text-gray-500">
                    Updated on {{ $blog->published_at ? $blog->published_at->format('F d, Y') : $blog->updated_at->format('F d, Y') }}
                </div>
            </div>
            
            <!-- Image Right -->
            @if($blog->featured_image)
            <div class="w-full lg:w-1/2">
                <img src="{{ $blog->featured_image_url ?? $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover rounded-xl shadow-lg">
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Reading Progress Bar -->
<div id="progress-bar" class="fixed top-0 left-0 h-1 bg-blue-600 z-50 transition-all duration-300" style="width: 0%"></div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Main Content -->
            <article class="flex-1 min-w-0 lg:order-1">
                <style>
                    .blog-content h2 { font-size: 1.875rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #111827; }
                    .blog-content h3 { font-size: 1.5rem; font-weight: 700; margin-top: 1.5rem; margin-bottom: 0.75rem; color: #111827; }
                    .blog-content p { margin-bottom: 1rem; line-height: 1.75; color: #374151; }
                    .blog-content ul { margin: 1rem 0; padding-left: 1.5rem; list-style-type: disc; }
                    .blog-content ol { margin: 1rem 0; padding-left: 1.5rem; list-style-type: decimal; }
                    .blog-content li { margin: 0.5rem 0; color: #374151; }
                    .blog-content strong { font-weight: 700; color: #111827; }
                    .blog-content img { margin: 2rem 0; border-radius: 0.75rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); width: 100%; }
                    .blog-content a { color: #2563eb; font-weight: 500; }
                    .blog-content a:hover { text-decoration: underline; }
                    .blog-content blockquote { border-left: 4px solid #2563eb; padding-left: 1rem; margin: 1.5rem 0; color: #4b5563; font-style: italic; background: #f9fafb; padding: 1rem; border-radius: 0.5rem; }
                    .blog-content table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
                    .blog-content th { background: #f3f4f6; padding: 0.75rem; text-align: left; font-weight: 600; color: #111827; border: 1px solid #e5e7eb; }
                    .blog-content td { padding: 0.75rem; border: 1px solid #e5e7eb; color: #374151; }
                    .blog-content pre { background: #f3f4f6; color: #1f2937; padding: 1rem; border-radius: 0.5rem; overflow-x: visible; white-space: pre-wrap; word-wrap: break-word; margin: 1.5rem 0; border: 1px solid #e5e7eb; }
                    .blog-content code { background: #f3f4f6; color: #1f2937; padding: 0.125rem 0.375rem; border-radius: 0.25rem; font-size: 0.875em; font-family: monospace; }
                    .blog-content pre code { background: transparent; color: #1f2937; padding: 0; }
                </style>
                <div class="blog-content text-base">
                    {!! $blog->content !!}
                </div>

                @if($blog->has_our_take && $blog->our_take)
                <div class="mt-16 p-8 bg-gray-50 border-l-4 border-blue-600 rounded-r-xl">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                        <h2 class="font-playfair text-3xl font-bold text-gray-900">Our Take</h2>
                    </div>
                    <div class="prose prose-lg max-w-none prose-p:text-gray-700">
                        {!! $blog->our_take !!}
                    </div>
                </div>
                @endif

                <div class="mt-16 pt-8 border-t">
                    <!-- Share Buttons -->
                    <div class="flex items-center gap-4 mb-8">
                        <span class="text-sm font-semibold text-gray-700">Share:</span>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="text-gray-600 hover:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path></svg>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="text-gray-600 hover:text-blue-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ request()->url() }}'); alert('Link copied!')" class="text-gray-600 hover:text-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </button>
                    </div>
                    
                    <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors">
                        <svg width="16" height="16" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180">
                            <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Back to All Articles</span>
                    </a>
                </div>
            </article>

            <!-- Sidebar Info -->
            <aside class="hidden lg:block w-80 flex-shrink-0 lg:order-2">
                <div class="sticky top-24 space-y-6">
                    <!-- Mobile TOC Toggle -->
                    <button id="mobile-toc-toggle" class="lg:hidden w-full bg-blue-600 text-white px-4 py-2 rounded-lg font-medium mb-4">
                        Table of Contents
                    </button>
                    
                    <!-- Article Info -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Article Details
                        </h3>
                        <div class="space-y-5">
                            @if($blog->author_name)
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center flex-shrink-0">
                                    @if($blog->author_image)
                                    <img src="{{ $blog->author_image_url ?? $blog->author_image }}" alt="{{ $blog->author_name }}" class="w-10 h-10 rounded-full object-cover">
                                    @else
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500 mb-1">Written by</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $blog->author_name }}</p>
                                </div>
                            </div>
                            @endif
                            
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500 mb-1">Published</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            
                            @if($blog->read_time)
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500 mb-1">Reading Time</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $blog->read_time }} minutes</p>
                                </div>
                            </div>
                            @endif
                            
                            @if($blog->category)
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500 mb-1">Category</p>
                                    <a href="{{ route('blog.category.show', $blog->category->slug) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700">
                                        {{ $blog->category->name }}
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- TOC -->
                    
                    <!-- Related Articles -->
                    @if($blog->category)
                    @php
                        $sidebarRelated = \App\Models\Blog::where('blog_category_id', $blog->blog_category_id)
                            ->where('id', '!=', $blog->id)
                            ->where('is_published', true)
                            ->take(3)
                            ->get();
                    @endphp
                    @if($sidebarRelated->count() > 0)
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            Related Articles
                        </h3>
                        <div class="space-y-4">
                            @foreach($sidebarRelated as $related)
                            <a href="{{ route('blog.show', $related->slug) }}" class="block group">
                                <div class="flex gap-3">
                                    <img src="{{ $related->featured_image_url ?? $related->featured_image }}" alt="{{ $related->title }}" class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 mb-1">{{ $related->title }}</h4>
                                        <p class="text-xs text-gray-500">{{ $related->published_at ? $related->published_at->format('M j, Y') : $related->created_at->format('M j, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif
                    
                    <!-- Category Tags -->
                    @if($blog->category && $blog->category->children->count() > 0)
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Topics
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($blog->category->children as $subcategory)
                            <a href="{{ route('blog.subcategory.show', [$blog->category->slug, $subcategory->slug]) }}" class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-600 transition-colors">
                                {{ $subcategory->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </aside>
        </div>
    </div>

<!-- Related Articles -->
@if($blog->category)
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $relatedBlogs = \App\Models\Blog::where('blog_category_id', $blog->blog_category_id)
                    ->where('id', '!=', $blog->id)
                    ->where('is_published', true)
                    ->take(3)
                    ->get();
            @endphp
            @foreach($relatedBlogs as $relatedBlog)
            <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                <div class="relative">
                    <img src="{{ $relatedBlog->featured_image_url ?? $relatedBlog->featured_image }}" alt="{{ $relatedBlog->title }}" class="w-full h-48 object-cover">
                    <span class="absolute top-4 left-4 text-sm font-medium text-blue-600 bg-white px-3 py-1 rounded-full">{{ $relatedBlog->category->name }}</span>
                </div>
                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-3">{{ $relatedBlog->published_at ? $relatedBlog->published_at->format('M j, Y') : $relatedBlog->created_at->format('M j, Y') }}</p>
                    <h3 class="text-sm font-bold text-gray-900 mb-4">{{ $relatedBlog->title }}</h3>
                    <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700">
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
@endif

<script>
// Reading Progress Bar
window.addEventListener('scroll', () => {
    const article = document.querySelector('article');
    const progressBar = document.getElementById('progress-bar');
    if (article && progressBar) {
        const articleHeight = article.offsetHeight;
        const articleTop = article.offsetTop;
        const scrolled = window.scrollY - articleTop;
        const progress = Math.min(Math.max((scrolled / articleHeight) * 100, 0), 100);
        progressBar.style.width = progress + '%';
    }
});

// Smooth Scroll for TOC
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Active TOC Highlighting
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            document.querySelectorAll('aside a[href^="#"]').forEach(link => {
                link.classList.remove('text-blue-600', 'font-semibold');
                link.classList.add('text-gray-600');
            });
            const id = entry.target.getAttribute('id');
            const activeLink = document.querySelector(`aside a[href="#${id}"]`);
            if (activeLink) {
                activeLink.classList.remove('text-gray-600');
                activeLink.classList.add('text-blue-600', 'font-semibold');
            }
        }
    });
}, { rootMargin: '-100px 0px -66%' });

document.querySelectorAll('h2[id], h3[id]').forEach(heading => {
    observer.observe(heading);
});
</script>
@endsection