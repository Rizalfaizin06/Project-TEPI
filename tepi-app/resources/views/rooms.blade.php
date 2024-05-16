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
    var_dump($room_data);
    
    // Memisahkan string berdasarkan koma dan menjadikannya array
    
    // Menampilkan hasil
    // print_r($data_fasilities);
    
    ?>
    <div class="flex flex-col items-center">
        <div class="w-full">

            <x-navbar />
        </div>
        <div class="w-3/5 flex flex-col">
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


            <div class="flex flex-col items-center gap-5">

                <a href="#" class="w-full">
                    <x-card-large />

                </a>
            </div>

        </div>
    </div>







</body>

</html>
