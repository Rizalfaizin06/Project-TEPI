<div
    class="flex flex-col h-96 items-center w-full h border border-gray-200 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full h-full rounded-t-lg md:w-96 md:rounded-none md:rounded-s-lg bg-blue-200"
        src="/images/rooms/Lab-202.jpg" alt="">
    <div class="flex flex-col gap-7 justify-between p-4 leading-normal w-full">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}
        </h5>


        {{-- {{ now()->format('y-m-d') }}
            {{ $date }} --}}
        <div class="flex w-full justify-center">

            @if ($timestart < now()->format('H:i:s') && $timeend > now()->format('H:i:s') && $date == now()->format('Y-m-d'))
                <span
                    class="items-center bg-red-100 text-red-800 max-w-sm text-md font-medium px-2.5 py-0.5 rounded-md dark:bg-red-900 dark:text-red-300 w-fit">
                    in use until {{ $timeend }}
                </span>
            @elseif ($date == now()->format('Y-m-d') && $timestart > now()->format('H:i:s'))
                <span
                    class="items-center bg-yellow-100 text-yellow-800 max-w-sm text-md font-medium px-2.5 py-0.5 rounded-md dark:bg-yellow-900 dark:text-yellow-300 w-fit">
                    will be used<br> from {{ $timestart }} until {{ $timeend }} </span>
            @elseif ($date == now()->format('Y-m-d') && $timeend < now()->format('H:i:s'))
                <span
                    class="items-center bg-blue-100 text-blue-800 max-w-sm text-md font-medium px-2.5 py-0.5 rounded-md dark:bg-blue-900 dark:text-blue-300 w-fit">
                    was used <br>from {{ $timestart }} until {{ $timeend }} </span>
            @elseif ($date > now()->format('Y-m-d'))
                <span
                    class="items-center bg-yellow-100 text-yellow-800 max-w-sm text-md font-medium px-2.5 py-0.5 rounded-md dark:bg-yellow-900 dark:text-yellow-300 w-fit">
                    Will be used on {{ $date }},<br> from {{ $timestart }} to {{ $timeend }}
                </span>
            @elseif ($date < now()->format('Y-m-d'))
                <span
                    class="items-center bg-blue-100 text-blue-800 max-w-sm text-md font-medium px-2.5 py-0.5 rounded-md dark:bg-blue-900 dark:text-blue-300 w-fit">
                    was used on {{ $date }},<br> from {{ $timestart }} to {{ $timeend }} </span>
            @else
                <span
                    class="items-center bg-green-100 text-green-800 max-w-sm text-md font-medium px-2.5 py-0.5 rounded-md dark:bg-green-900 dark:text-green-300 w-fit">
                    unexpected contiion, date: {{ $date }}, start: {{ $timestart }}, end:
                    {{ $timeend }}
                </span>
            @endif
        </div>
        {{-- {{ $timestart }} --}}
        {{-- in use until 14:00 || will be used from 06 - 71 --}}
        <div class="flex flex-col items-center flex-1 gap-2 max-w-sm px-5">
            <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Access Group
            </h5>
            <div class="max-w-64">

                @foreach ($groups as $group)
                    <x-group-badge :text="$group" />
                @endforeach
            </div>
        </div>
    </div>
</div>
