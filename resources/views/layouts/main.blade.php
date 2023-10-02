<!DOCTYPE html>
<html lang="en" class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    {{-- SEO --}}
    <meta name="description"
        content="NOIU merupakan Tour &amp; Travel berlisensi resmi yang dikelola secara profesional dan berdomisili di Bandung. Kami melayani wisata baik domestik maupun mancanegara">
    <meta name="robots" content="max-image-preview:large">
    <link rel="canonical" href="https://noiu-eo.com/">
    <meta name="generator" content="All in One SEO (AIOSEO) 4.4.6">
    <meta property="og:site_name" content="NOIU EO - Outbound Bandung">
    <meta property="og:type" content="website">
    <meta property="og:title" content="NOIU EO | Outbound Bandung | Paket Outbound Bandung">
    <meta property="og:description"
        content="NOIU merupakan Tour &amp; Travel berlisensi resmi yang dikelola secara profesional dan berdomisili di Bandung. Kami melayani wisata baik domestik maupun mancanegara">
    <meta property="og:url" content="https://noiu-eo.com/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NOIU EO | Outbound Bandung | Paket Outbound Bandung">
    <meta name="twitter:description"
        content="NOIU merupakan Tour &amp; Travel berlisensi resmi yang dikelola secara profesional dan berdomisili di Bandung. Kami melayani wisata baik domestik maupun mancanegara">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <title>{{ $title ?? 'NOIU page' }}</title>
    @vite(['resources/js/App.js'])
</head>

<body>

    {{-- Scroll to Top --}}
    <div id="progress"
        class="fixed bottom-5 right-5 sm:bottom-10 sm:right-10 z-50 h-12 w-12 justify-center items-center bg-neutral-40 rounded-full shadow-md hidden hover:block cursor-pointer">
        <span id="progress-value"
            class="h-10 w-10 bg-white rounded-full grid place-items-center text-primary-20 text-2xl">
            <i class="fa-solid fa-arrow-up"></i></span>
    </div>
    @include('partials.alert')
    @include('partials.sidebar')

    <div class="lg:ml-[250px]">
        @yield('container')
    </div>

    @include('partials.footer')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}

</body>

</html>
