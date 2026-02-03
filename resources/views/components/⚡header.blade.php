<?php

use Livewire\Component;

new class extends Component
{
    public $mobileMenuOpen = false;

    public function toggleMobileMenu()
    {
        $this->mobileMenuOpen = !$this->mobileMenuOpen;
    }
};
?>

<nav class="flex items-center justify-between p-4 md:px-16 lg:px-24 xl:px-32 md:py-6 w-full">
    <a href="{{ route('home') }}" wire:navigate class="flex items-center">
        <div class="text-2xl font-bold text-gray-900">GetAIGovernance</div>
    </a>
    
    <div class="{{ $mobileMenuOpen ? 'max-md:w-full' : 'max-md:w-0' }} max-md:absolute max-md:top-0 max-md:left-0 max-md:transition-all max-md:duration-300 max-md:overflow-hidden max-md:h-full max-md:bg-white/95 max-md:backdrop-blur max-md:flex-col max-md:justify-center flex items-center gap-8 font-medium">
        <a href="{{ route('home') }}" wire:navigate class="hover:text-gray-600 transition-colors">
            Home
        </a>
        <a href="{{ route('categories') }}" wire:navigate class="hover:text-gray-600 transition-colors">
            Categories
        </a>
        <a href="{{ route('compare') }}" wire:navigate class="hover:text-gray-600 transition-colors">
            Compare
        </a>
        <a href="{{ route('blog') }}" wire:navigate class="hover:text-gray-600 transition-colors">
            Blog
        </a>
        <a href="{{ route('qa') }}" wire:navigate class="hover:text-gray-600 transition-colors">
            Q&A
        </a>
        <div class="md:hidden flex flex-col gap-3 mt-8">
            <button class="border border-blue-300 hover:border-blue-400 text-blue-700 px-4 py-2 rounded-full text-sm font-medium transition">
                Request Guidance
            </button>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm font-medium transition">
                Add Your Tool
            </button>
        </div>
        <button wire:click="toggleMobileMenu" class="md:hidden bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-md aspect-square font-medium transition mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
    </div>
    
    <div class="hidden md:flex items-center gap-3">
        <button class="border border-blue-300 hover:border-blue-400 text-blue-700 px-4 py-2 rounded-full text-sm font-medium transition">
            Request Guidance
        </button>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm font-medium transition">
            Add Your Tool
        </button>
    </div>

    <button wire:click="toggleMobileMenu" class="md:hidden bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-md aspect-square font-medium transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 12h16" />
            <path d="M4 18h16" />
            <path d="M4 6h16" />
        </svg>
    </button>
</nav>