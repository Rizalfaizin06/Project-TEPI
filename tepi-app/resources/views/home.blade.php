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
    // var_dump($fac);
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
                    $room_data = [
                        'id' => $room->id,
                        'title' => $room->title,
                        'picture' => $room->picture,
                        'description' => $room->description,
                        'facility' => $room->facility->pluck('category')->toArray(),
                    ];
                    ?>
                    <input type="hidden" name="room_data" value="{{ json_encode($room_data) }}">
                    <button type="submit">
                        <x-card :title="$room->title" :desc="$room->description" :pic="$room->picture" :status="$room->status"
                            :facility="$room->facility->pluck('category')->toArray()" />
                    </button>
                </form>
            @endforeach

        </div>

    </div>


    <script>
        $(document).ready(function() {
            $('.group').select2({
                placeholder: 'select'
            });
            $('#group').select2({
                ajax: {
                    url: "{{ route('get-category') }}",
                    type: "post",
                    delay: 0,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            search: params.term,
                            "_token": "{{ csrf_token() }}"
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.category
                                };
                            })
                        };
                    }
                }
            });
        });
    </script>



</body>

</html>
