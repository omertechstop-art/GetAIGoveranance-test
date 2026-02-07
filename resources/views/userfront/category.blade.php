@extends('layouts.app')

@section('title', $category->name . ' - AI Governance Tools')

@section('hero')
    <div class="text-center mt-16 md:mt-24 px-4">
        <h1 class="text-4xl md:text-6xl font-bold max-w-4xl mx-auto leading-tight">
            {{ $category->name }} <span class="text-blue-600">Tools</span>
        </h1>
        <p class="text-lg md:text-xl mx-auto max-w-2xl mt-6 text-gray-600">
            {{ $category->description ?? 'Discover the best ' . $category->name . ' solutions for AI governance.' }}
        </p>
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
                <p class="text-gray-500">No vendors found in this category yet.</p>
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