<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AI Governance Hub')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .font-berkshire {
            font-family: 'Berkshire Swash', cursive;
        }
    </style>
</head>
<body>
    <section class="bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/bg-with-grid.png')] bg-cover bg-center bg-no-repeat w-full text-sm pb-20 md:pb-32 relative overflow-hidden">
        <div class="relative z-10">
            <livewire:header />
            @yield('hero')
        </div>
    </section>

    <main>
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>