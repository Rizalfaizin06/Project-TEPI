@php
    // $booking_data = json_decode($booking_data, true);
    // var_dump($booking_data);
    // $picture = $room_data['picture'];
@endphp


<div class="w-full p-5 flex justify-center items-center justify-items-center">
    <div class="flex gap-10 h-fit w-fit">
        <div class=" flex-1 min-w-96">
            <x-picture-card :image="$booking_data['student']['avatar']" />
        </div>
        <div class="ps-5 flex-1 min-w-96">
            <h1 class="text-primary font-poppins font-bold text-2xl ">Identity</h1>
            <div class="flex">
                <p class="text-primary font-poppins font-semibold text-md w-16">Name</p>
                <p class="text-primary font-poppins font-semibold text-md "> :
                    {{ $booking_data['student']['name'] }}</p>
            </div>
            <div class="flex">
                <p class="text-primary font-poppins font-semibold text-md w-16">NIM</p>
                <p class="text-primary font-poppins font-semibold text-md "> :
                    {{ $booking_data['student']['NIM'] }}</p>
            </div>
            <div class="flex">
                <p class="text-primary font-poppins font-semibold text-md w-16">Email</p>
                <p class="text-primary font-poppins font-semibold text-md "> :
                    {{ $booking_data['student']['email'] }}</p>
            </div>
            <h1 class="text-primary font-poppins font-bold text-2xl pt-5">Room</h1>
            <div class="flex">
                <p class="text-primary font-poppins font-semibold text-md ">{{ $booking_data['rooms']['title'] }}
                </p>
            </div>
            <h1 class="text-primary font-poppins font-bold text-2xl pt-5">Datetime</h1>
            <div class="flex">
                <p class="text-primary font-poppins font-semibold text-md w-16">Date</p>
                <p class="text-primary font-poppins font-semibold text-md "> :
                    {{ $booking_data['booking']['date'] }}</p>
            </div>
            <div class="flex">
                <p class="text-primary font-poppins font-semibold text-md w-16">Start</p>
                <p class="text-primary font-poppins font-semibold text-md "> :
                    {{ $booking_data['booking']['time_start'] }}</p>
            </div>
            <div class="flex">
                <p class="text-primary font-poppins font-semibold text-md w-16">End</p>
                <p class="text-primary font-poppins font-semibold text-md "> :
                    {{ $booking_data['booking']['time_end'] }}</p>
            </div>
            <h1 class="text-primary font-poppins font-bold text-2xl pt-5">Group Access</h1>


            <ul class="space-y-1 text-primary font-poppins font-semibold text-md list-disc list-inside">
                @foreach ($booking_data['group_category'] as $group)
                    <li>{{ $group }}</li>
                @endforeach

            </ul>



            <form action="/room/confirm" method="post">
                @csrf
                <div class="flex gap-5 w-full">

                    <button type="button" onclick="window.location='{{ route('home_page') }}'"
                        class="text-primary border-primary hover:bg-blue-300 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center border dark:text-blue-600 dark:hover:text-primary dark:focus:ring-blue-700 mt-5 w-full">Cancle</button>


                    <button type="submit"
                        class="text-white bg-primary hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-700 mt-5 w-full">Confirm</button>

                </div>
        </div>
