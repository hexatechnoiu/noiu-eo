<!DOCTYPE html>
<html lang="en" class="!scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NOIU</title>
        @vite(['resources/js/app.js','resources/css/app.css'])

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">

        {{-- Slick --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    </head>
    <body>

    {{-- Scroll to Top --}}
    <div id="progress" class="fixed bottom-5 right-5 sm:bottom-10 sm:right-10 z-50 h-12 w-12 justify-center items-center bg-Neutral-40 rounded-full shadow-md hidden hover:block cursor-pointer">
        <span id="progress-value" class="h-10 w-10 bg-white rounded-full grid place-items-center text-Primary-20 text-2xl"><i class="fa-solid fa-arrow-up"></i></span>
    </div>

        @include('partials.sidebar')
        
            <div class="lg:ml-[250px]">
                @yield('container')
            </div>

        @include('partials.footer')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    </body>
</html>