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
    // $fac = $rooms[3]->facility->pluck('category')->toArray();
    
    // foreach ($fac as $fas) {
    //     echo $fas;
    // }
    var_dump($rooms[3]);
    
    // Memisahkan string berdasarkan koma dan menjadikannya array
    
    // Menampilkan hasil
    // print_r($data_fasilities);
    
    ?>

    <x-navbar />
    <div class="w-full ">
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
                <form action="/room/details" method="post">
                    @csrf
                    <?php
                    
                    // echo $room->facilities;
                    $data_fasilities = explode(',', $room->facilities);
                    // var_dump($data_fasilities);
                    $room_data = [
                        'id' => $room->id,
                        'title' => $room->title,
                        'picture' => $room->picture,
                        'description' => $room->description,
                        'facility' => $data_fasilities,
                    ];
                    ?>
                    <input type="hidden" name="room_data" value="{{ json_encode($room_data) }}">
                    <button type="submit">
                        <x-card :title="$room->title" :desc="$room->description" :pic="$room->picture" :status="$room->room_state"
                            :facility="$data_fasilities" />
                    </button>
                </form>
            @endforeach

        </div>

    </div>




</body>

</html>
