<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="{{ asset('js/app.js') }}"></script>
    <title>{{ $title }}</title>
</head>

<body>

    <div class="flex flex-col">
        <div class="z-20 mb-32">

            <x-navbar />
        </div>

        <section
            class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
            <div class="py-8 px-4 text-center lg:py-16 z-10 relative">

                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-6xl lg:text-9xl dark:text-white">
                    TEPI</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-4xl sm:px-16 lg:px-48 dark:text-gray-200">
                    Teknologi Pintu Pintar Berbasis IoT dengan RFID untuk Keamanan, Manajemen Akses, dan
                    Efisiensi Ruang Kampus
                </p>

                <a href="/"
                    class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                    <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">Lebih lanjut</span> <span
                        class="text-sm font-medium">Mari coba pesan ruangan
                    </span>
                    <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </a>

            </div>
            <div
                class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0">
            </div>
        </section>

    </div>
</body>

</html>
