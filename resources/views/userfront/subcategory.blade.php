@extends('layouts.app')

@section('title', $child->name . ' - ' . $parent->name . ' Tools')

@section('hero')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="flex items-center gap-2 text-sm text-gray-600 mb-6">
            <a href="{{ route('category.show', $parent->slug) }}" class="hover:text-blue-600 transition-colors font-medium">{{ $parent->name }}</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-blue-600 font-semibold">{{ $child->name }}</span>
        </nav>
        
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-2xl mb-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            
            <h1 class="font-playfair text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                {{ $child->name }} <span class="text-blue-600">Solutions</span>
            </h1>
            
            <p class="text-base text-gray-600 max-w-3xl mx-auto mb-6">
                {{ $child->description ?? 'Specialized ' . $child->name . ' tools and solutions for ' . $parent->name . '.' }}
            </p>
            
            <div class="flex items-center justify-center gap-4 text-sm flex-wrap">
                <div class="flex items-center gap-2 bg-white px-5 py-2 rounded-full shadow-md">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="font-semibold text-gray-900">{{ $vendors->total() }}</span>
                    <span class="text-gray-600">Vendors</span>
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
    <div class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @forelse($vendors as $vendor)
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $vendor->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $vendor->description }}</p>
                <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Learn more →</a>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">No vendors found in this subcategory yet.</p>
            </div>
            @endforelse
        </div>
        
        @if($vendors->hasPages())
        <div class="mt-12">
            {{ $vendors->links() }}
        </div>
        @endif
    </div>
@endsection