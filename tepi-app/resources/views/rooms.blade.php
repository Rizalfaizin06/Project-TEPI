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
        $totalPage = $room_data->total();
        $lastPage = $room_data->lastPage();
        $currentPage = $room_data->currentPage();
        $perPage = $room_data->perPage();
        // $fac = $rooms[3]->facility->pluck('category')->toArray();
        $data_dropdown = [
            'all' => 'All Status',
            'in_use' => 'In Use',
            'was_use' => 'Was Use',
            'will_use' => 'Will Be Use',
        ];

        $search_data = [
            'search' => request('search'),
            'state' => request('status'),
        ];
        // foreach ($fac as $fas) {
        //     echo $fas;
        // }
        // var_dump($room_data->total());

        // print_r($data_fasilities);
    @endphp

    <div class="flex flex-col items-center">
        <div class="w-full">

            <x-navbar :title="$title" />
        </div>
        <div class="w-3/5 flex flex-col">

            <form id="searchForm" action="/rooms" method="get">
                <div class="flex justify-between items-center p-5">
                    <div class=" ">
                        <x-search-bar />
                    </div>
                    <div class="flex gap-3">
                        <x-dropdown :params="request('status')" :values="$data_dropdown" />
                    </div>
                </div>
            </form>

            {{-- <h1 class="text-primary font-poppins font-bold text-2xl py-5">Laboratorium</h1> --}}

            <div class="flex flex-col items-center gap-5 ">
                <div class="flex flex-col gap-5 px-5">
                    @foreach ($room_data as $room)
                        {{-- <form action="/room/details" method="post"> --}}
                        @csrf
                        <?php
                        
                        // echo $room->date;
                        // echo ' - ';
                        // echo $room->time_start;
                        $data_groups = explode(',', $room->category);
                        $room_data = [
                            'id' => $room->id,
                            'title' => $room->title,
                            'picture' => $room->picture,
                            'description' => $room->description,
                            'groups' => $data_groups,
                        ];
                        // var_dump($room_data);
                        ?>
                        <input type="hidden" name="room_data" value="{{ json_encode($room_data) }}">
                        <button type="submit">
                            <x-card-large :title="$room->title" :desc="$room->description" :pic="$room->picture" :timestart="$room->time_start"
                                :timeend="$room->time_end" :date="$room->date" :groups="$data_groups" />

                            {{-- <x-card :title="$room->title" :desc="$room->description" :pic="$room->picture" :status="$room->room_state"
                            :facility="$data_fasilities" /> --}}
                        </button>
                        {{-- </form> --}}
                    @endforeach

                </div>
                <x-pagination :total="$totalPage" :lastpage="$lastPage" :perpage="$perPage" :currentpage="$currentPage"
                    :search="$search_data" />
                {{-- <x-pagination :total="$rooms->total()" :lastpage="$rooms->lastPage()" :perpage="$rooms->perPage()" :currentpage="$rooms->currentPage()"
                    :search="$search_data" /> --}}
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
