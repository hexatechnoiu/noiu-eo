<!DOCTYPE html>
<html lang="en" class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'NOIU page' }}</title>
    @vite(['resources/js/App.js'])
</head>

<body>
    @include('partials.alert')

        {{-- Scroll to Top --}}
        @unless(Request::is('booking'))
            <div id="progress" class="fixed bottom-5 right-5 sm:bottom-10 sm:right-10 z-50 h-12 w-12 justify-center items-center bg-neutral-40 rounded-full shadow-md hidden hover:block cursor-pointer">
                <span id="progress-value" class="h-10 w-10 bg-white rounded-full grid place-items-center text-primary-20 text-2xl">
                    <i class="fa-solid fa-arrow-up"></i>
                </span>
            </div>
        @endunless

    @include('partials.sidebar')

    <div class="lg:ml-[250px]">
        @yield('container')
    </div>

</body>

</html>
