<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<nav class="w-full py-4 md:py-6 fixed top-0 left-0 right-0 bg-white z-50 transition-transform duration-300" id="main-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between relative">
    <a href="{{ route('home') }}" wire:navigate class="flex items-center">
        <img src="{{ asset('logo-check-check.png') }}" alt="GetAIGovernance" class="h-8 md:h-12 w-auto max-h-full">
    </a>
    
    <div class="hidden xl:flex items-center gap-8 font-futura absolute left-1/2 transform -translate-x-1/2">
        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors font-futura">
            Home
        </a>
        
        <a href="{{ route('categories') }}" class="hover:text-blue-600 transition-colors font-futura">
            Marketplace
        </a>
        
        <!-- Categories Mega Menu -->
        <livewire:mega-menu type="categories" title="Categories" />
        
        <!-- Resources Mega Menu -->
        <livewire:mega-menu type="blog" title="Resources" />
        
        <a href="{{ route('qa') }}" class="hover:text-blue-600 transition-colors font-futura">
            Q&A
        </a>
    </div>
    
    <div class="hidden xl:flex items-center gap-3">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm font-medium transition">
            Add Your Tool
        </button>
    </div>

    <div @click="$dispatch('toggle-sidebar')" class="xl:hidden group flex h-12 w-12 cursor-pointer items-center justify-center rounded-xl bg-white p-2 hover:bg-slate-200">
        <div class="space-y-1.5">
            <span class="block h-0.5 w-6 origin-center rounded-full bg-black transition-transform ease-in-out"></span>
            <span class="block h-0.5 w-5 origin-center rounded-full bg-blue-500 transition-transform ease-in-out"></span>
        </div>
    </div>
    </div>
</nav>