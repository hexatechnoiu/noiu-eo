@extends('layouts.main')

@section('container')


{{-- Hero Section --}}
<section class="bg-center bg-no-repeat bg-cover bg-neutral-40 bg-blend-multiply lg:h-[100vh]" style="background-image: url('{{ asset('img/noiu.jpg') }}')">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-44 lg:py-56">
        <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-white sm:text-4xl md:text-5xl lg:text-6xl">Together We Make
            <span id="typewriter" class="text-secondary-40"></span>
        </h1>
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 lg:px-48">Between your business objectives and what your customers want.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="/outbound" class="inline-flex justify-center items-center py-3 px-7 text-lg font-normal text-center text-white rounded-lg bg-primary-40 hover:text-black hover:bg-secondary-40 focus:ring-4 focus:ring-secondary-20 duration-300">
                Get started
            </a>
        </div>
    </div>
</section>

{{-- Clients Logo --}}
<section class="bg-primary-40 py-6">
    <div class="logo-slider ml-10 lg:ml-24 space-x-7">
        @for ($i = 1; $i <= 12; $i++)
        <div class="flex justify-center items-center cursor-default">
            <img class="w-12 md:w-24 hover:scale-110 transition-transform duration-[400ms] cursor-pointer" src="{{ asset('img/clients/logo' . $i . '.png') }}" alt="">
        </div>
        @endfor
    </div>
</section>

{{-- Your Benefits --}}
<section class="bg-white px-12 mt-10 lg:mt-20">
    <div class="flex flex-col lg:flex-row gap-8 items-center mx-auto max-w-screen-xl xl:gap-16">
        <div class="lg:w-[200px] lg:h-[320px] rounded-lg overflow-hidden cursor-pointer">
            <img class="object-cover w-full h-full transform origin-center hover:scale-125 transition-transform duration-500" src="{{ asset('img/noiu.jpg') }}" alt="noiu image">
        </div>
        <div class="lg:w-3/4">
            <h2 class="mb-4 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">NOIU EVENT ORGANIZER</h2>
            <p class="mb-4 font-light text-neutral-60 md:text-lg">NOIU merupakan Tour & Travel berlisensi resmi yang dikelola secara profesional dan berdomisili di Bandung. Kami melayani dan membantu perjalanan wisata anda, baik domestik maupun mancanegara. Selain itu, kami juga membantu pelaksanaan untuk kegiatan Meeting, Gathering, Outbound dan Minat Khusus. NOIU memiliki fokus utama terhadap kepuasan klien. Sehingga kami sangat memperhatikan kualitas pelayanan yang diberikan. Anda dapat berkonsultasi dengan kami mengenai kebutuhan perjalanan anda secara personal. Kami siap untuk menawarkan solusi perjalanan yang komprehensif untuk anda.</p>
        </div>
    </div>
</section>

<section class="bg-white px-12 lg:mt-14">
    <div class="py-8 mx-auto max-w-screen-xl">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-2 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">Alasan Memilih NOIU</h2>
            <p class="text-neutral-60 sm:text-xl">Your Benefits List</p>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            {{-- @foreach ($benefits as $bft)
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-10 lg:h-12 lg:w-12 transform hover:scale-x-[-1] transition-transform duration-[400ms] cursor-pointer">
                    <i class="{{ $bft->icon }} text-center text-primary-40"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">{{ $bft->title }}</h3>
                <p class="text-neutral-60">{{ $bft->desc }}</p>
            </div>
            @endforeach --}}

            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-10 lg:h-12 lg:w-12 transform hover:scale-x-[-1] transition-transform duration-[400ms] cursor-pointer">
                    <i class="fa-solid fa-thumbs-up fa-lg text-center text-primary-40"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">Mudah dan Nyaman</h3>
                <p class="text-neutral-60">Kami hadir untuk membantu memudahkan kegiatan & perjalanan liburan anda. Sehingga anda dapat menikmati perjalanan dengan nyaman tanpa repot.</p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-10 lg:h-12 lg:w-12 transform hover:scale-x-[-1] transition-transform duration-[400ms] cursor-pointer">
                    <i class="fa-solid fa-puzzle-piece fa-lg text-center text-primary-40"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">Fleksibel</h3>
                <p class="text-neutral-60">Selain paket yang ditawarkan dengan program standar, anda juga dapat memesan itinerary / fasilitas sesuai dengan yang diinginkan.</p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-10 lg:h-12 lg:w-12 transform hover:scale-x-[-1] transition-transform duration-[400ms] cursor-pointer">
                    <i class="fa-solid fa-award fa-lg text-center text-primary-40"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">Profesional</h3>
                <p class="text-neutral-60">Kami memiliki team yang berpengalaman dan profesional. Anda akan mendapatkan kemudahan dan kenyamanan baik saat konsultasi mengenai paket dan program maupun saat kegiatan berlangsung</p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-10 lg:h-12 lg:w-12 transform hover:scale-x-[-1] transition-transform duration-[400ms] cursor-pointer">
                    <i class="fa-solid fa-receipt fa-lg text-center text-primary-40"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">Harga Terjangkau</h3>
                <p class="text-neutral-60">Harga yang kami tawarkan sangatlah kompetitif. Mengapa demikian ? Karena kami telah bekerja sama dengan banyak vendor seperti hotel, transportasi, restoran dan objek wisata.</p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-10 lg:h-12 lg:w-12 transform hover:scale-x-[-1] transition-transform duration-[400ms] cursor-pointer">
                    <i class="fa-solid fa-lock fa-lg text-center text-primary-40"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">Keamanan</h3>
                <p class="text-neutral-60">NOIU merupakan perusahaan travel yang berlisensi dan resmi. Sehingga anda dapat mempercayakan kegiatan dan liburan anda kepada kami. Yang tentunya akan memberikan kenyamanan dan pengalaman yang tak terlupakan.</p>
            </div>
        </div>
    </div>
</section>

{{-- Book --}}
<section class="bg-primary-40 px-12 py-6 mt-10 lg:mt-20">
    <div class="flex flex-col md:flex-row mx-auto max-w-screen-xl py-6 gap-8 items-center xl:gap-16">
        <div class="lg:w-3/4">
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-white sm:text-4xl">Ready for an unforgatable tour with noiu?</h2>
            <p class="max-w-2xl font-light text-white sm:text-xl">Number One I'ts You</p>
        </div>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="/package" class="inline-flex justify-center items-center py-3 px-7 text-lg font-normal text-center text-black rounded-lg bg-secondary-40 hover:text-white hover:bg-secondary-60 focus:ring-4 focus:ring-secondary-50 duration-[400ms]">
                Booking Now
            </a>
        </div>
    </div>
</section>

{{-- Google Maps --}}
<section class="bg-white px-12 my-10 lg:mt-20">
    <div class="mx-auto max-w-screen-xl">
        <div class="w-full h-[400px] rounded-lg overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31685.62218651873!2d107.73568!3d-6.926088000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c34340474011%3A0x9b168ae56ab4d897!2snoiu%20event%20organizer!5e0!3m2!1sid!2sid!4v1693284698058!5m2!1sid!2sid" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

@endsection
