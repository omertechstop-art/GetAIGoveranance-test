<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GetAIGovernance: Best AI Tools + Governance Solutions')</title>
    @yield('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap');

        * {
            font-family: 'Futura', 'Arial', sans-serif;
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .font-futura {
            font-family: 'Futura', 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    @hasSection('hero')
    <section class="bg-white w-full text-sm relative overflow-hidden pt-24">
        <div class="relative z-10">
            <livewire:header />
            @yield('hero')
        </div>
    </section>
    @else
    <livewire:header />
    <div class="pt-24"></div>
    @endif

    <livewire:sidebar />

    <main>
        @yield('content')
    </main>

    <livewire:footer/>

    @livewireScripts
    <script>
        let lastScrollTop = 0;
        const header = document.getElementById('main-header');
        
        if (header) {
            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop;
            });
        }
        
        // Ensure content is visible after Livewire navigation
        document.addEventListener('livewire:navigated', () => {
            // Force a repaint to ensure content is visible
            document.body.style.display = 'none';
            document.body.offsetHeight; // Trigger reflow
            document.body.style.display = '';
        });
    </script>
</body>
</html>