<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="{{ asset('js/app.js') }}"></script>
</head>

<body>

    <x-navbar />
    <div class="container  p-10 ">
        <div class="flex justify-between items-center py-5">
            <div class=" ">
                <x-search-bar />
            </div>
            <div class="flex gap-3">
                <x-dropdown />
                <x-dropdown />
            </div>
        </div>

        <h1 class="text-primary font-poppins font-bold text-2xl py-5">Laboratorium</h1>
        <div class="flex gap-5">
            @foreach ($rooms as $room)
                <x-card title="{{ $room['title'] }}" body="{{ $room['desc'] }}" />
            @endforeach

        </div>

    </div>

</body>

</html>
