<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <script defer src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>{{ $title }}</title>
</head>

<body>
    {{-- {{ $room_data }} --}}
    <?php
    
    $room_data = json_decode($room_data, true);
    $picture = $room_data['picture'];
    ?>




    {{-- <x-navbar /> --}}
    <div class="w-full p-5 flex justify-center items-center h-screen">
        <div class="flex">
            <div>
                <x-picture-card :image="$room_data['picture']" />
            </div>
            <div class="ps-5">
                <h1 class="text-primary font-poppins font-bold text-2xl  pb-5"> {{ $room_data['title'] }} </h1>
                <p class="text-primary font-poppins text-lg  max-w-2xl">{{ $room_data['description'] }} </p>
                <h1 class="text-primary font-poppins font-bold text-2xl  pb-5 pt-10 ">Facility</h1>
                <?php
                sort($room_data['facility']);
                $uniqueFacilities = [];
                foreach ($room_data['facility'] as $facility_row) {
                    $found = false;
                    foreach ($uniqueFacilities as $uniqueFacility) {
                        if ($facility_row == $uniqueFacility) {
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $uniqueFacilities[] = $facility_row;
                    }
                }
                ?>
                <div class=" flex gap-5 ">
                    @foreach ($uniqueFacilities as $fac)
                        <x-feature-badge logo="{{ $fac }}" />
                    @endforeach
                </div>
                <h1 class="text-primary font-poppins font-bold text-2xl  pt-10 min-w-40">Booking</h1>

                <form action="/room/booking" method="post">
                    @csrf
                    <div class="flex gap-5">
                        <div class="w-1/2 flex flex-col gap-5">
                            <div class="flex-1 flex flex-col justify-between">
                                <label for="time_start"
                                    class="text-primary font-poppins font-semibold text-lg  min-w-40">Time</label>

                                <div date-rangepicker class="flex items-center justify-between">

                                    <input type="time" id="time_start" name="time_start"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        min="06:00" max="22:00" required />

                                    <span class="mx-4 text-gray-500">to</span>



                                    <input type="time" id="time_end" name="time_end"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        min="06:00" max="22:00" required />


                                </div>


                            </div>
                            <div class="flex-1 flex flex-col justify-between">

                                <label for="date"
                                    class="text-primary font-poppins font-semibold text-lg  min-w-40">Date</label>

                                <input type="date" id="date" name="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date" required>




                            </div>
                            <div class="flex-1 flex flex-col justify-between">
                                <label for="group" class="text-primary font-poppins font-semibold text-lg  min-w-40">
                                    Group</label>
                                <div class="">
                                    <select class="group w-full" id="group" name="group[]" multiple="multiple"
                                        required></select>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 flex flex-col justify-between">


                            <label for="description"
                                class="text-primary font-poppins font-semibold text-lg">Description</label>
                            <textarea id="description" rows="4" name="description"
                                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your thoughts here..." required></textarea>
                            <input type="hidden" name="room_id" value="{{ $room_data['id'] }}">
                            <div class="flex gap-5 w-full">

                                <button type="button" onclick="window.location='{{ route('home_page') }}'"
                                    class="text-primary border-primary hover:bg-blue-300 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center border dark:text-blue-600 dark:hover:text-primary dark:focus:ring-blue-700 mt-5 w-full">Cancle</button>


                                <button type="submit"
                                    class="text-white bg-primary hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-700 mt-5 w-full">Booking</button>

                            </div>
                        </div>



                    </div>
                </form>
            </div>
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
