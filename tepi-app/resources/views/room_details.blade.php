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
    {{ $room_data }}
    <?php
    
    $room_data = json_decode($room_data, true);
    $picture = $room_data['picture'];
    ?>




    <x-navbar />
    <div class="w-full p-5 flex justify-center">
        <div class="flex">
            <div>


                <x-picture-card :image="$room_data['picture']" />
            </div>
            <div>

                <h1 class="text-primary font-poppins font-bold text-2xl px-5 pb-5"> {{ $room_data['title'] }} </h1>
                <p class="text-primary font-poppins text-lg px-5 max-w-2xl">{{ $room_data['description'] }} </p>
                <h1 class="text-primary font-poppins font-bold text-2xl px-5 pb-5 pt-10 ">Facility</h1>

                <?php sort($room_data['facility']);
                
                $uniqueFacilities = [];
                foreach ($room_data['facility'] as $facility_row) {
                    $found = false;
                    foreach ($uniqueFacilities as $uniqueFacility) {
                        if ($facility_row['category'] == $uniqueFacility['category']) {
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $uniqueFacilities[] = $facility_row;
                    }
                }
                
                // var_dump($uniqueFacilities);
                
                ?>

                <div class=" flex gap-5 px-5">
                    @foreach ($uniqueFacilities as $fac)
                        <x-feature-badge logo="{{ $fac['category'] }}" />
                    @endforeach
                </div>
            </div>
        </div>




        {{-- <div class="">

            <div class="bg-cover bg-center max-w-md h-72" style="background-image: url('/images/rooms/Lab-202.jpg')">
            </div>


        </div> --}}
    </div>


</body>


</html>
