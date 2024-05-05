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
    <?php
    $fac = $rooms[3]->facility->pluck('category')->toArray();
    
    // foreach ($fac as $fas) {
    //     echo $fas;
    // }
    // var_dump($fac);
    
    ?>

    <x-navbar />
    <div class="container   ">
        <div class="flex justify-between items-center p-5">
            <div class=" ">
                <x-search-bar />
            </div>
            <div class="flex gap-3">
                <x-dropdown />
                <x-dropdown />
            </div>
        </div>

        <h1 class="text-primary font-poppins font-bold text-2xl p-5">Laboratorium</h1>

        <div class="flex gap-5 overflow-x-scroll px-5">
            @foreach ($rooms as $room)
                {{-- <x-card title="{{ $room->title }}" desc="{{ $room->description }}" pic="{{ $room->picture }}"
                    status="{{ $room->status }}" facility="{{ $room->facility->pluck('category')->toJson() }}" /> --}}
                <x-card :title="$room->title" :desc="$room->description" :pic="$room->picture" :status="$room->status" :facility="$room->facility->pluck('category')->toArray()" />
            @endforeach

        </div>

    </div>

</body>

</html>
