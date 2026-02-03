@extends('layouts.app')

@section('title', 'AI Governance Marketplace - Compare & Discover Tools')

@section('hero')
    <div class="flex items-center gap-2 border border-blue-200 bg-blue-50/50 hover:bg-blue-50 rounded-full w-max mx-auto px-3 py-1.5 mt-12 md:mt-16 transition-colors">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" fill="#2563eb" stroke="#2563eb" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="text-blue-700 text-sm">200+ AI governance tools listed</span>
        <button class="flex items-center gap-1 font-medium text-blue-700 text-sm">
            <span>View all</span>
            <svg width="14" height="14" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    
    <h1 class="font-berkshire text-3xl sm:text-4xl md:text-5xl lg:text-6xl max-w-4xl text-center mx-auto mt-6 leading-tight px-4">
        The AI governance <span class="font-berkshire text-blue-600">marketplace</span> for enterprise teams
    </h1>

    <p class="text-base md:text-lg mx-auto max-w-2xl text-center mt-4 text-gray-600 px-4">
        Discover, compare, and evaluate AI governance tools. From monitoring platforms to compliance solutions - find the right tool for your team's needs.
    </p>

    <div class="mx-auto w-full flex flex-col sm:flex-row items-center justify-center gap-3 mt-6 px-4">
        <button class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-full font-medium transition">
            Explore Vendors
        </button>
        <button class="w-full sm:w-auto flex items-center justify-center gap-2 border border-gray-300 hover:border-gray-400 hover:bg-gray-50 rounded-full px-6 py-2.5 transition font-medium">
            <span>Get Matched</span>
            <svg width="5" height="7" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.25.5 4.75 4l-3.5 3.5" stroke="currentColor" stroke-opacity=".6" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <!-- Quick Categories -->
    <div class="mt-12 px-4">
        <p class="text-center text-gray-500 mb-6 text-sm">Browse by category</p>
        <div class="flex flex-wrap justify-center gap-2 max-w-3xl mx-auto">
            <a href="#" class="bg-white/80 hover:bg-white border border-gray-200 hover:border-gray-300 rounded-full px-4 py-2 text-sm font-medium transition shadow-sm hover:shadow">
                Governance Platforms (24)
            </a>
            <a href="#" class="bg-white/80 hover:bg-white border border-gray-200 hover:border-gray-300 rounded-full px-4 py-2 text-sm font-medium transition shadow-sm hover:shadow">
                Model Monitoring (18)
            </a>
            <a href="#" class="bg-white/80 hover:bg-white border border-gray-200 hover:border-gray-300 rounded-full px-4 py-2 text-sm font-medium transition shadow-sm hover:shadow">
                AI Security (12)
            </a>
            <a href="#" class="bg-white/80 hover:bg-white border border-gray-200 hover:border-gray-300 rounded-full px-4 py-2 text-sm font-medium transition shadow-sm hover:shadow">
                Compliance Tools (16)
            </a>
        </div>
    </div>
@endsection

@section('content')
@endsection