@extends('layouts.app')

@section('title', 'GetAIGovernance: Best AI Tools + Governance Solutions + Monitoring')

@section('meta')
<meta name="description" content="Data-driven GetAIGovernance research and expert analysis to help users find and evaluate the best AI governance tools and monitoring solutions.">
<meta name="keywords" content="AI governance, AI tools, model monitoring, AI security, compliance tools, AI platforms">
@endsection

@section('hero')
    <div class="flex items-center gap-2 border border-blue-200 bg-blue-50/50 hover:bg-blue-50 rounded-full w-max mx-auto px-3 py-1.5 mt-12 md:mt-16 transition-colors">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" fill="#2563eb" stroke="#2563eb" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="text-blue-700 text-sm">200+ governance solutions listed</span>
        <button class="flex items-center gap-1 font-medium text-blue-700 text-sm">
            <span>View all</span>
            <svg width="14" height="14" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    
    <h1 class="font-playfair text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold max-w-4xl text-center mx-auto mt-6 leading-tight px-4">
        The AI governance <span class="font-playfair text-blue-600">marketplace</span> for enterprise teams
    </h1>

    <p class="font-futura text-base md:text-lg mx-auto max-w-2xl text-center mt-4 text-gray-600 px-4">
        Discover, compare, and evaluate tools that help organizations govern, monitor, and comply with AI regulations. Find the right governance solution for your compliance needs.
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
    <!-- How It Works Section -->
    <section class="py-8 bg-white sm:py-12 lg:py-16 -mt-4 sm:-mt-8">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="font-playfair text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">How does it <span class="font-playfair text-blue-600">work?</span></h2>
                <p class="font-futura max-w-lg mx-auto mt-4 text-base leading-relaxed text-gray-600">We'll guide you to the best governance solution and help you implement it successfully</p>
            </div>

            <div class="relative mt-12 lg:mt-20">
                <div class="absolute inset-x-0 hidden xl:px-44 top-2 md:block md:px-20 lg:px-28">
                    <img class="w-full" src="https://cdn.rareblocks.xyz/collection/celebration/images/steps/2/curved-dotted-line.svg" alt="" />
                </div>

                <div class="relative grid grid-cols-1 text-center gap-y-12 md:grid-cols-3 gap-x-12">
                    <div>
                        <div class="flex items-center justify-center w-16 h-16 mx-auto bg-blue-600 border-2 border-blue-600 rounded-full shadow">
                            <span class="text-xl font-semibold text-white"> 1 </span>
                        </div>
                        <h3 class="font-futura mt-6 text-xl font-semibold leading-tight text-black md:mt-10">Browse & <span class="font-playfair text-blue-600">Learn</span></h3>
                        <p class="font-futura mt-4 text-base text-gray-600">Read our in-depth research guides or chat with our advisors to make informed decisions about AI governance and compliance solutions.</p>
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-16 h-16 mx-auto bg-blue-600 border-2 border-blue-600 rounded-full shadow">
                            <span class="text-xl font-semibold text-white"> 2 </span>
                        </div>
                        <h3 class="font-futura mt-6 text-xl font-semibold leading-tight text-black md:mt-10">Compare Top <span class="font-playfair text-blue-600">Matches</span></h3>
                        <p class="font-futura mt-4 text-base text-gray-600">Our comparison tools filter vetted governance vendors based on your specific compliance requirements and organizational needs.</p>
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-16 h-16 mx-auto bg-blue-600 border-2 border-blue-600 rounded-full shadow">
                            <span class="text-xl font-semibold text-white"> 3 </span>
                        </div>
                        <h3 class="font-futura mt-6 text-xl font-semibold leading-tight text-black md:mt-10">Pick Your <span class="font-playfair text-blue-600">Solution</span></h3>
                        <p class="font-futura mt-4 text-base text-gray-600">Gain confidence in selecting the right governance solution. We'll help you evaluate vendors and negotiate implementation terms.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse Categories Section -->
    <section class="py-16 bg-white mt-16">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-left mb-12">
                <h2 class="font-playfair text-3xl font-bold text-black sm:text-4xl lg:text-5xl mb-4">Browse all <span class="font-playfair text-blue-600">categories</span></h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($categories as $category)
                    @foreach($category->children as $subcategory)
                        <a href="#" class="block px-6 py-4 text-left transition-all duration-200 group hover:bg-gray-50 rounded-lg border-l-4 border-transparent hover:border-blue-600">
                            <span class="font-futura text-lg font-bold text-gray-700">{{ $subcategory->name }}</span>
                        </a>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- Connect with Advisor Section -->
    <section class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative cursor-pointer">
                <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-500 rounded-lg"></span>
                <div class="relative p-6 md:p-12 bg-white border-2 border-blue-500 rounded-lg hover:scale-105 transition duration-500 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="pl-0 md:pl-12 text-center md:text-left">
                        <h3 class="font-playfair text-2xl md:text-3xl font-bold text-gray-800 mb-2">Need guidance? Connect with a<br>GetAIGovernance Advisor - it's free</h3>
                    </div>
                    <div class="pr-0 md:pr-12">
                        <button class="font-futura bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-medium transition-all duration-200 shadow-lg hover:shadow-xl w-full md:w-auto">
                            Connect with us
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center max-w-4xl mx-auto">
                <!-- FAQ Content -->
                <div class="flex flex-col items-start text-left">
                    <h1 class="font-playfair text-3xl md:text-4xl font-semibold mt-2 mb-10">Frequently Asked <span class="font-playfair text-blue-600">Questions</span></h1>

                    <div id="faqContainer" class="max-w-xl w-full mt-6 flex flex-col gap-4 items-start text-left"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Insights Section -->
    <section class="py-8 lg:py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-playfair text-3xl text-black sm:text-4xl lg:text-5xl mb-4">Trusted insights, <span class="font-playfair text-blue-600">updated daily</span></h2>
                <p class="font-futura text-lg text-gray-600">Exclusive research from our expert analysts.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="AI Governance" class="w-full h-48 object-cover">
                        <span class="absolute top-4 left-4 text-sm font-medium text-blue-600 bg-white px-3 py-1 rounded-full">AI Governance</span>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-500 mb-3">John Smith • Feb 3, 2026</p>
                        <h3 class="font-futura text-sm font-bold text-gray-900 mb-4">AI Governance Best Practices, Dos and Don'ts</h3>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors">
                            <span>Read More</span>
                            <svg width="14" height="14" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </article>
                
                <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="AI Compliance" class="w-full h-48 object-cover">
                        <span class="absolute top-4 left-4 text-sm font-medium text-blue-600 bg-white px-3 py-1 rounded-full">AI Compliance</span>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-500 mb-3">Sarah Johnson • Feb 2, 2026</p>
                        <h3 class="font-futura text-sm font-bold text-gray-900 mb-4">AI Compliance Tools Pricing Plans, Features & Best Alternatives</h3>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors">
                            <span>Read More</span>
                            <svg width="14" height="14" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </article>
                
                <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1518186285589-2f7649de83e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="AI Monitoring" class="w-full h-48 object-cover">
                        <span class="absolute top-4 left-4 text-sm font-medium text-blue-600 bg-white px-3 py-1 rounded-full">AI Monitoring</span>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-500 mb-3">Mike Davis • Jan 29, 2026</p>
                        <h3 class="font-futura text-sm font-bold text-gray-900 mb-4">What is AI Model Monitoring and How to Improve It?</h3>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors">
                            <span>Read More</span>
                            <svg width="14" height="14" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.959 9.5h11.083m0 0L9.501 3.958M15.042 9.5l-5.541 5.54" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }
</style>

<script>
    const faqsData = [
        {
            question: 'What makes GetAIGovernance different?',
            answer: 'Founded in 2024, GetAIGovernance is the only website dedicated exclusively to researching, testing, and comparing tools that help organizations govern, monitor, and comply with AI regulations. Unlike other comparison sites, we focus solely on AI governance, compliance, and security solutions, providing unbiased insights based on hands-on testing.'
        },
        {
            question: 'How does GetAIGovernance make money?',
            answer: 'GetAIGovernance is an advertising-supported publisher and comparison service. We are compensated for featured placement of sponsored products and for connecting prospective leads to service providers. This compensation does not impact our objectivity or review process.'
        },
        {
            question: 'Who are GetAIGovernance advisors?',
            answer: 'GetAIGovernance employs top AI technology and governance experts. We are a group of specialists with deep understanding of AI governance, compliance, and monitoring industries, bolstered by hands-on research and continuing education in AI safety and regulation.'
        },
        {
            question: 'Do companies pay GetAIGovernance to review their products?',
            answer: 'No, companies do not pay us to review their products or write our content. Our team of editors maintains 100% editorial independence and researches and decides on relevant AI governance topics to produce.'
        },
        {
            question: 'What is AI Governance?',
            answer: 'AI Governance refers to the frameworks, policies, and practices that ensure AI systems are developed, deployed, and managed responsibly. It includes risk management, compliance monitoring, ethical AI practices, and regulatory adherence to ensure AI systems are safe, fair, and transparent.'
        }
    ];

    document.addEventListener('DOMContentLoaded', function() {
        const faqContainer = document.getElementById('faqContainer');

        faqContainer.innerHTML = faqsData.map((faq, index) => `
        <div class="faq-item flex flex-col items-start w-full" data-index="${index}">
            <div class="faq-header flex items-center justify-between w-full cursor-pointer border border-indigo-100 p-4 rounded transition-all">
                <h2 class="text-sm">${faq.question}</h2>
                <svg class="faq-icon transition-all duration-500 ease-in-out" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="m4.5 7.2 3.793 3.793a1 1 0 0 0 1.414 0L13.5 7.2" stroke="#1D293D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <p class="faq-answer text-sm text-slate-500 px-4 overflow-hidden max-h-0 opacity-0 -translate-y-2 transition-all duration-500 ease-in-out">
                ${faq.answer}
            </p>
        </div>
        `).join('');

        let openIndex = null;

        document.querySelectorAll('.faq-header').forEach((header, index) => {
            header.addEventListener('click', () => {
                const answer = document.querySelectorAll('.faq-answer')[index];
                const icon = document.querySelectorAll('.faq-icon')[index];
                
                const isOpen = answer.classList.contains('opacity-100');
                answer.classList.toggle('opacity-100', !isOpen);
                answer.classList.toggle('max-h-[300px]', !isOpen);
                answer.classList.toggle('translate-y-0', !isOpen);
                answer.classList.toggle('pt-4', !isOpen);
                answer.classList.toggle('max-h-0', isOpen);
                answer.classList.toggle('-translate-y-2', isOpen);
                icon.classList.toggle('rotate-180', !isOpen);
            });
        });
    });
</script>