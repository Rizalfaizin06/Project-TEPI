<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <title>{{ $title }}</title>
</head>

<body>
    @php
        // $tes = 'computer,electrical_plug,lan,projector,webcam';
        // $data_dropdown = explode(',', $tes);
        $data_dropdown = [
            'all' => 'All Status',
            'available' => 'Available',
            'unavailable' => 'Unavailable',
        ];

        $search_data = [
            'search' => request('search'),
            'state' => request('status'),
        ];
        // $fac = $rooms[3]->facility->pluck('category')->toArray();

        // foreach ($fac as $fas) {
        //     echo $fas;
        // }
        // var_dump($rooms->lastPage());
        // var_dump($rooms->total());
        // var_dump($rooms);

        // print_r($rooms[0]->data_fasilities);
    @endphp


    <div class="flex flex-col items-center">
        <div class="w-full">

            <x-navbar :title="$title" />
        </div>
        <div class="w-3/4">

            <form id="searchForm" action="/" method="get">
                <div class="flex justify-between items-center p-5">
                    <div class=" ">
                        <x-search-bar />
                    </div>
                    <div class="flex gap-3">
                        <x-dropdown :params="request('status')" :values="$data_dropdown" />
                    </div>
                </div>
            </form>
            <h1 class="text-primary font-poppins font-bold text-2xl p-5">Laboratorium</h1>

            <div class="flex flex-col gap-5 items-center">
                <div class="flex gap-5 w-full justify-center px-5">
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
                <x-pagination :total="$rooms->total()" :lastpage="$rooms->lastPage()" :perpage="$rooms->perPage()" :currentpage="$rooms->currentPage()"
                    :search="$search_data" />

            </div>
        </div>



    </div>
    <script>
        $(document).ready(function() {
            $('#statusDropdown').on('change', function() {
                $('#searchForm').submit();
            });
        });
    </script>
</body>

</html>
