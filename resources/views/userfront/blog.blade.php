@extends('layouts.app')

@section('title', 'AI Governance Blog - Insights & Best Practices | GetAIGovernance')

@section('hero')
<section class="relative bg-white">
        <div class="relative z-10 px-4 py-12 sm:py-16 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-20 xl:py-28 lg:grid lg:grid-cols-2 lg:pointer-events-none">
            <div class="lg:pr-8 lg:pointer-events-auto">
                <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                    <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl lg:text-5xl">
                        AI Governance <span class="inline"><img class="inline w-auto h-8 sm:h-10 lg:h-12" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/4/shape-1.svg" alt="shape-1" /></span> Insights & Best Practices
                        <span class="inline"><img class="inline w-auto h-8 sm:h-10 lg:h-11" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/4/shape-2.svg" alt="shape-2" /></span>
                    </h1>
                    <p class="mt-6 text-base font-normal leading-7 text-gray-900">Stay ahead with expert perspectives on AI compliance, ethics, and governance. Explore our curated articles on responsible AI implementation.</p>
                    <svg class="w-auto h-4 mt-8 text-gray-300" viewbox="0 0 172 16" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 11 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 46 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 81 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 116 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 151 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 18 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 53 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 88 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 123 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 158 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 25 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 60 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 95 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 130 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 165 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 32 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 67 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 102 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 137 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 172 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 39 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 74 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 109 1)"></line>
                        <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 144 1)"></line>
                    </svg>
                    <p class="mt-8 text-base font-bold text-gray-900">Explore Topics</p>
                    <div class="flex flex-wrap gap-3 mt-4">
                        <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-blue-600 text-white hover:bg-blue-700 transition-all" data-category="all">All Topics</button>
                        @foreach($subcategories as $subcategory)
                        <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-white text-gray-700 hover:bg-blue-50 hover:text-blue-600 border border-gray-300 hover:border-blue-300 transition-all" data-category="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-8 lg:absolute lg:inset-0 lg:pb-0">
            <div class="flex flex-col items-center justify-center overflow-hidden lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <div class="flex justify-start w-full gap-6 pb-8 overflow-x-auto snap-x">
                    @foreach($featuredBlogs->take(3) as $blog)
                    <div class="relative snap-start scroll-ml-6 shrink-0 first:pl-6 last:pr-6">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="relative flex flex-col overflow-hidden transition-all duration-200 transform bg-white border border-gray-100 shadow w-60 md:w-80 group rounded-xl hover:shadow-lg hover:-translate-y-1">
                            <div class="flex shrink-0 aspect-w-4 aspect-h-3">
                                <img class="object-cover w-full h-full transition-all duration-200 transform group-hover:scale-110" src="{{ $blog->featured_image_url ?? $blog->featured_image }}" alt="{{ $blog->title }}" />
                            </div>
                            <div class="flex-1 px-4 py-5 sm:p-6">
                                <p class="text-lg font-bold text-gray-900 line-clamp-2">{{ $blog->title }}</p>
                                <p class="mt-3 text-sm font-normal leading-6 text-gray-500 line-clamp-3">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                            </div>
                            <div class="px-4 py-5 mt-auto border-t border-gray-100 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        @if($blog->category)
                                        <p class="text-sm font-medium text-gray-900">{{ $blog->category->name }}</p>
                                        <span class="text-sm font-medium text-gray-900">•</span>
                                        @endif
                                        <p class="text-sm font-medium text-gray-900">{{ $blog->published_at ? $blog->published_at->format('M j, Y') : $blog->created_at->format('M j, Y') }}</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-300 transition-all duration-200 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="17" y1="7" x2="7" y2="17"></line>
                                        <polyline points="8 7 17 7 17 16"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-end mt-2 space-x-5">
                    <div class="w-16 h-[3px] rounded-full bg-gray-900"></div>
                    <div class="w-16 h-[3px] rounded-full bg-gray-300"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- All Articles -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-center justify-between mb-10">
            <h2 class="font-playfair text-3xl font-bold text-gray-900">Latest Articles</h2>
            <div class="text-sm text-gray-500" id="article-count">{{ count($blogs) }} articles</div>
        </div>
        <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
            <article class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                <div class="relative overflow-hidden">
                    <img src="{{ $blog->featured_image_url ?? $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                    @if($blog->category)
                    <span class="absolute top-4 left-4 text-xs font-bold text-blue-600 bg-white px-4 py-1.5 rounded-full shadow-md">{{ $blog->category->name }}</span>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ $blog->published_at ? $blog->published_at->format('M j, Y') : $blog->created_at->format('M j, Y') }}</span>
                    </div>
                    <h3 class="font-playfair text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">{{ $blog->title }}</h3>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:gap-3 transition-all">
                        <span>Read More</span>
                        <svg width="16" height="16" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <button id="load-more-btn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl transition-all" data-offset="15">
                Load More Articles
            </button>
        </div>
    </div>
</div>

<script>
let currentCategory = 'all';
let currentSearch = '';
let allBlogs = @json($blogs);
let featuredBlogs = @json($featuredBlogs);

function renderBlogs(blogs) {
    const grid = document.getElementById('blog-grid');
    const loadMoreBtn = document.getElementById('load-more-btn');
    const articleCount = document.getElementById('article-count');
    
    grid.innerHTML = '';
    
    if (blogs.length === 0) {
        grid.innerHTML = '<div class="col-span-full text-center py-20"><div class="text-gray-400 text-6xl mb-4">📝</div><p class="text-gray-500 text-lg">No articles found matching your criteria.</p></div>';
        loadMoreBtn.style.display = 'none';
        articleCount.textContent = '0 articles';
        return;
    }
    
    articleCount.textContent = `${blogs.length} article${blogs.length !== 1 ? 's' : ''}`;
    
    blogs.forEach(blog => {
        const article = document.createElement('article');
        article.className = 'group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100';
        article.innerHTML = `
            <div class="relative overflow-hidden">
                <img src="${blog.featured_image_url || blog.featured_image}" alt="${blog.title}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                ${blog.category ? `<span class="absolute top-4 left-4 text-xs font-bold text-blue-600 bg-white px-4 py-1.5 rounded-full shadow-md">${blog.category.name}</span>` : ''}
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>${new Date(blog.published_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</span>
                </div>
                <h3 class="font-playfair text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">${blog.title}</h3>
                <a href="/blog/${blog.slug}" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:gap-3 transition-all">
                    <span>Read More</span>
                    <svg width="16" height="16" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        `;
        grid.appendChild(article);
    });
    
    loadMoreBtn.style.display = blogs.length >= 15 ? 'block' : 'none';
}

function filterBlogs() {
    let filtered = allBlogs;
    
    if (currentCategory !== 'all') {
        filtered = filtered.filter(blog => blog.category && blog.category.id == currentCategory);
    }
    
    if (currentSearch) {
        const searchLower = currentSearch.toLowerCase();
        filtered = filtered.filter(blog => 
            blog.title.toLowerCase().includes(searchLower) ||
            (blog.excerpt && blog.excerpt.toLowerCase().includes(searchLower))
        );
    }
    
    renderBlogs(filtered);
}

document.querySelectorAll('.category-filter').forEach(btn => {
    btn.addEventListener('click', function() {
        const categoryId = this.dataset.category;
        
        if (categoryId !== 'all') {
            const category = @json($subcategories).find(c => c.id == categoryId);
            if (category) {
                window.location.href = `/blog/category/${category.slug}`;
                return;
            }
        }
        
        document.querySelectorAll('.category-filter').forEach(b => {
            b.classList.remove('bg-blue-600', 'text-white', 'shadow-md');
            b.classList.add('bg-white', 'text-gray-700', 'border-2', 'border-gray-200');
        });
        
        this.classList.remove('bg-white', 'text-gray-700', 'border-2', 'border-gray-200');
        this.classList.add('bg-blue-600', 'text-white', 'shadow-md');
        
        currentCategory = this.dataset.category;
        filterBlogs();
    });
});

let searchTimeout;
document.getElementById('search-input').addEventListener('input', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        currentSearch = this.value.trim();
        filterBlogs();
    }, 300);
});

document.getElementById('load-more-btn').addEventListener('click', function() {
    const btn = this;
    const offset = parseInt(btn.dataset.offset);
    
    btn.textContent = 'Loading...';
    btn.disabled = true;
    
    fetch(`/api/blogs?offset=${offset}`)
        .then(response => response.json())
        .then(data => {
            if (data.blogs && data.blogs.length > 0) {
                const nonFeatured = data.blogs.filter(blog => !blog.is_featured);
                allBlogs = [...allBlogs, ...nonFeatured];
                btn.dataset.offset = offset + 15;
                btn.textContent = 'Load More';
                btn.disabled = false;
                
                if (data.blogs.length < 15) {
                    btn.style.display = 'none';
                }
                
                filterBlogs();
            } else {
                btn.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            btn.textContent = 'Load More';
            btn.disabled = false;
        });
});
</script>
@endsection