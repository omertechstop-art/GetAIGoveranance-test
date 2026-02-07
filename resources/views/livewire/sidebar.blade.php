<div x-data="{ isOpen: false }" @toggle-sidebar.window="isOpen = !isOpen" class="xl:hidden">
    <!-- Backdrop -->
    <div x-show="isOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-white bg-opacity-80 backdrop-blur-sm z-40"
         @click="isOpen = false"
         style="display: none;"></div>

    <!-- Sidebar -->
    <div x-show="isOpen"
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 w-80 h-full bg-white shadow-xl z-50 overflow-y-auto overscroll-contain"
         style="display: none;"
         x-data="{ categoriesOpen: false, blogOpen: false, openSubcategories: {} }">
        
        <!-- Close Button -->
        <div class="flex justify-end p-4">
            <div class="group flex h-12 w-12 cursor-pointer items-center justify-center rounded-xl bg-white p-2 hover:bg-slate-200" @click="isOpen = false">
                <div class="space-y-1.5">
                    <span class="block h-0.5 w-6 origin-center rounded-full bg-black transition-transform ease-in-out rotate-45"></span>
                    <span class="block h-0.5 w-6 origin-center rounded-full bg-blue-500 transition-transform ease-in-out -rotate-45 -translate-y-2"></span>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="px-6 pb-6">
            <nav class="space-y-2">
                <a href="{{ route('home') }}" wire:navigate @click="isOpen = false" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Home</span>
                </a>

                <a href="#" @click="isOpen = false" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="font-medium">Marketplace</span>
                </a>

                <!-- Blog Dropdown -->
                <div>
                    <button @click="blogOpen = !blogOpen" class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            <span class="font-medium">Blog</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': blogOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="blogOpen" x-transition class="ml-8 mt-2 space-y-1">
                        <a href="{{ route('blog') }}" wire:navigate @click="isOpen = false" class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-colors">
                            All Posts
                        </a>
                        @foreach($blogCategories as $category)
                            <div>
                                <button @click="openSubcategories['blog_{{ $category->id }}'] = !openSubcategories['blog_{{ $category->id }}']"
                                        class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-colors">
                                    <span>{{ $category->name }}</span>
                                    @if($category->children->count() > 0)
                                        <svg class="w-3 h-3 transition-transform" :class="{ 'rotate-180': openSubcategories['blog_{{ $category->id }}'] }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    @endif
                                </button>
                                @if($category->children->count() > 0)
                                    <div x-show="openSubcategories['blog_{{ $category->id }}']" x-transition class="ml-4 mt-1 space-y-1">
                                        @foreach($category->children as $subcategory)
                                            <a href="{{ route('blog') }}?category={{ $subcategory->slug }}" wire:navigate @click="isOpen = false" 
                                               class="flex items-center justify-between px-4 py-1 text-xs text-gray-500 hover:text-blue-600 hover:bg-gray-50 rounded transition-colors">
                                                <span>{{ $subcategory->name }}</span>
                                                @if($subcategory->published_blogs_count > 0)
                                                    <span class="text-xs bg-gray-200 text-gray-600 px-1.5 py-0.5 rounded-full">{{ $subcategory->published_blogs_count }}</span>
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Categories Dropdown -->
                <div>
                    <button @click="categoriesOpen = !categoriesOpen" class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3m16 14H5"></path>
                            </svg>
                            <span class="font-medium">Categories</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': categoriesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="categoriesOpen" x-transition class="ml-8 mt-2 space-y-1">
                        <a href="{{ route('categories') }}" wire:navigate @click="isOpen = false" class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-colors">
                            All Categories
                        </a>
                        @foreach($blogCategories as $category)
                            <div>
                                <button @click="openSubcategories['cat_{{ $category->id }}'] = !openSubcategories['cat_{{ $category->id }}']"
                                        class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-colors">
                                    <span>{{ $category->name }}</span>
                                    @if($category->children->count() > 0)
                                        <svg class="w-3 h-3 transition-transform" :class="{ 'rotate-180': openSubcategories['cat_{{ $category->id }}'] }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    @endif
                                </button>
                                @if($category->children->count() > 0)
                                    <div x-show="openSubcategories['cat_{{ $category->id }}']" x-transition class="ml-4 mt-1 space-y-1">
                                        @foreach($category->children as $subcategory)
                                            <a href="{{ route('blog') }}?category={{ $subcategory->slug }}" wire:navigate @click="isOpen = false" 
                                               class="flex items-center justify-between px-4 py-1 text-xs text-gray-500 hover:text-blue-600 hover:bg-gray-50 rounded transition-colors">
                                                <span>{{ $subcategory->name }}</span>
                                                @if($subcategory->published_blogs_count > 0)
                                                    <span class="text-xs bg-gray-200 text-gray-600 px-1.5 py-0.5 rounded-full">{{ $subcategory->published_blogs_count }}</span>
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('qa') }}" wire:navigate @click="isOpen = false" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Q&A</span>
                </a>
            </nav>
        </div>
    </div>
</div>