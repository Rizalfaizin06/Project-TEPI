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
    $totalPage = $accest_list->total();
    $lastPage = $accest_list->lastPage();
    $currentPage = $accest_list->currentPage();
    $perPage = $accest_list->perPage();
    // $fac = $rooms[3]->facility->pluck('category')->toArray();
    
    // foreach ($fac as $fas) {
    //     echo $fas;
    // }
    // var_dump($accest_list);
    
    // Memisahkan string berdasarkan koma dan menjadikannya array
    
    // Menampilkan hasil
    // print_r($data_fasilities);
    ?>


    <div class="flex flex-col items-center">
        <div class="w-full">

            <x-navbar />
        </div>
        <div class="w-3/5 flex flex-col">

            {{-- <h1 class="text-primary font-poppins font-bold text-2xl py-5">Laboratorium</h1> --}}

            <div class="flex flex-col items-center gap-5">
                <div class="flex flex-col gap-5 px-5">

                    <h1 class="text-primary font-poppins font-bold text-2xl pt-5">Access Log</h1>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No. </th>
                                    <th scope="col" class="px-6 py-3">
                                        Student
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Room
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Message
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Timestamps
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = $currentPage * $perPage - ($perPage - 1);
                                @endphp
                                @foreach ($accest_list as $access)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $counter }} </th>
                                        <td class="px-6 py-4">
                                            {{ $access->student->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $access->room->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $access->message }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $access->created_at }}
                                        </td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
                <x-pagination :total="$totalPage" :lastpage="$lastPage" :perpage="$perPage" :currentpage="$currentPage" />

            </div>

        </div>
    </div>





</body>

</html>
