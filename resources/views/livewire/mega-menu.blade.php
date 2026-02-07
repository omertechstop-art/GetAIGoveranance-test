<div x-data="{ open: false }" 
     @mouseenter="open = true" 
     @mouseleave="open = false"
     class="relative">
    
    <!-- Menu Trigger -->
    <button class="hover:text-blue-600 transition-colors flex items-center gap-1.5 py-2 group">
        {{ $title }}
        <svg class="w-4 h-4 transition-all duration-200 group-hover:text-blue-600" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    
    <!-- Mega Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 transform translate-y-4 scale-95"
         class="absolute top-full left-1/2 transform -translate-x-1/2 mt-3 w-screen max-w-md sm:max-w-xl md:max-w-3xl lg:max-w-5xl bg-white rounded-2xl shadow-2xl border border-gray-100 z-50 overflow-hidden"
         style="display: none;"
         @click.away="open = false">
        
        @if($type === 'categories')
        <!-- Header Section -->
        <div class="bg-white px-4 sm:px-6 lg:px-8 py-4 sm:py-6 border-b border-gray-100">
            <div class="text-center">
                <h2 class="font-playfair text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-1 sm:mb-2">AI Governance Categories</h2>
                <p class="font-futura text-sm sm:text-base text-gray-600 max-w-2xl mx-auto hidden sm:block">Discover and compare the best AI governance, compliance, and monitoring solutions</p>
            </div>
        </div>
        
        <!-- Categories Grid -->
        <div class="p-3 sm:p-4 lg:p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
                @foreach($categories as $index => $category)
                <div class="group">
                    <!-- Category Header -->
                    <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4 lg:mb-6 pb-2 sm:pb-3 border-b border-gray-100">
                        <div class="w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 flex items-center justify-center">
                            @if($index % 4 == 0)
                                <x-heroicon-o-shield-check class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @elseif($index % 4 == 1)
                                <x-heroicon-o-chart-bar class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @elseif($index % 4 == 2)
                                <x-heroicon-o-cog class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @else
                                <x-heroicon-o-eye class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @endif
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base lg:text-lg font-bold text-gray-900">{{ $category->name }}</h3>
                        </div>
                    </div>
                    
                    <!-- Subcategories -->
                    <div class="space-y-1 sm:space-y-1.5 lg:space-y-2">
                        @foreach($category->children->take(3) as $subcategory)
                        <a href="{{ route('category.subcategory', [$category->slug, $subcategory->slug]) }}" wire:navigate class="flex items-center justify-between p-1.5 sm:p-2 lg:p-3 rounded-md sm:rounded-lg hover:bg-gray-50 transition-all duration-200 group/item">
                            <div class="flex items-center gap-1.5 sm:gap-2 lg:gap-3">
                                <div class="w-1 h-1 sm:w-1.5 sm:h-1.5 lg:w-2 lg:h-2 bg-blue-400 rounded-full group-hover/item:bg-blue-600 transition-colors"></div>
                                <span class="text-xs sm:text-sm lg:text-base font-medium text-gray-700 group-hover/item:text-blue-600 transition-colors">{{ $subcategory->name }}</span>
                            </div>
                            <x-heroicon-o-chevron-right class="w-2.5 h-2.5 sm:w-3 sm:h-3 lg:w-4 lg:h-4 text-gray-400 group-hover/item:text-blue-600 opacity-0 group-hover/item:opacity-100 transition-all duration-200" />
                        </a>
                        @endforeach
                        
                        @if($category->children->count() > 3)
                        <a href="{{ route('category.show', $category->slug) }}" wire:navigate class="flex items-center gap-1.5 sm:gap-2 p-1.5 sm:p-2 lg:p-3 text-blue-600 hover:text-blue-700 font-medium text-xs sm:text-sm transition-colors">
                            <span>View all</span>
                            <x-heroicon-o-arrow-right class="w-2.5 h-2.5 sm:w-3 sm:h-3 lg:w-4 lg:h-4" />
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Footer CTA -->
        <div class="bg-gray-50 px-3 sm:px-4 lg:px-8 py-3 sm:py-4 lg:py-6 border-t border-gray-100">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-0">
                <div class="text-center sm:text-left">
                    <h3 class="text-sm sm:text-base font-semibold text-gray-900">Need help choosing?</h3>
                    <p class="text-xs sm:text-sm text-gray-600 hidden sm:block">Get personalized recommendations</p>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm w-full sm:w-auto">
                    Get Matched
                </button>
            </div>
        </div>
        @elseif($type === 'blog')
        <!-- Header Section -->
        <div class="bg-white px-4 sm:px-6 lg:px-8 py-4 sm:py-6 border-b border-gray-100">
            <div class="text-center">
                <h2 class="font-playfair text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-1 sm:mb-2">Resources & Insights</h2>
                <p class="font-futura text-sm sm:text-base text-gray-600 max-w-2xl mx-auto hidden sm:block">Explore articles, guides, and insights on AI governance and best practices</p>
            </div>
        </div>
        
        <!-- Blog Categories Grid -->
        <div class="p-3 sm:p-4 lg:p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
                @foreach($categories as $index => $category)
                <div class="group">
                    <!-- Category Header -->
                    <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4 lg:mb-6 pb-2 sm:pb-3 border-b border-gray-100">
                        <div class="w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 flex items-center justify-center">
                            @if($index % 4 == 0)
                                <x-heroicon-o-document-text class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @elseif($index % 4 == 1)
                                <x-heroicon-o-light-bulb class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @elseif($index % 4 == 2)
                                <x-heroicon-o-book-open class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @else
                                <x-heroicon-o-academic-cap class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-gray-600" />
                            @endif
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base lg:text-lg font-bold text-gray-900">{{ $category->name }}</h3>
                        </div>
                    </div>
                    
                    <!-- Subcategories -->
                    <div class="space-y-1 sm:space-y-1.5 lg:space-y-2">
                        @foreach($category->children->take(3) as $subcategory)
                        <a href="{{ route('blog.category.subcategory', [$category->slug, $subcategory->slug]) }}" wire:navigate class="flex items-center justify-between p-1.5 sm:p-2 lg:p-3 rounded-md sm:rounded-lg hover:bg-gray-50 transition-all duration-200 group/item">
                            <div class="flex items-center gap-1.5 sm:gap-2 lg:gap-3">
                                <div class="w-1 h-1 sm:w-1.5 sm:h-1.5 lg:w-2 lg:h-2 bg-blue-400 rounded-full group-hover/item:bg-blue-600 transition-colors"></div>
                                <span class="text-xs sm:text-sm lg:text-base font-medium text-gray-700 group-hover/item:text-blue-600 transition-colors">{{ $subcategory->name }}</span>
                            </div>
                            <x-heroicon-o-chevron-right class="w-2.5 h-2.5 sm:w-3 sm:h-3 lg:w-4 lg:h-4 text-gray-400 group-hover/item:text-blue-600 opacity-0 group-hover/item:opacity-100 transition-all duration-200" />
                        </a>
                        @endforeach
                        
                        @if($category->children->count() > 3)
                        <a href="{{ route('blog.category.show', $category->slug) }}" wire:navigate class="flex items-center gap-1.5 sm:gap-2 p-1.5 sm:p-2 lg:p-3 text-blue-600 hover:text-blue-700 font-medium text-xs sm:text-sm transition-colors">
                            <span>View all</span>
                            <x-heroicon-o-arrow-right class="w-2.5 h-2.5 sm:w-3 sm:h-3 lg:w-4 lg:h-4" />
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Footer with Blog Link -->
        <div class="bg-gray-50 px-3 sm:px-4 lg:px-8 py-3 sm:py-4 lg:py-6 border-t border-gray-100">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-0">
                <div class="text-center sm:text-left">
                    <h3 class="text-sm sm:text-base font-semibold text-gray-900">Explore All Resources</h3>
                    <p class="text-xs sm:text-sm text-gray-600 hidden sm:block">Browse our complete library of articles and guides</p>
                </div>
                <a href="{{ route('blog') }}" wire:navigate class="bg-blue-600 hover:bg-blue-700 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm w-full sm:w-auto text-center">
                    View All Articles
                </a>
            </div>
        </div>
        @endif
    </div>
</div>