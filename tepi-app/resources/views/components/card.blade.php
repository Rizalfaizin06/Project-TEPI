<div class="min-w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg h-64" src="{{ $pic }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
        </a>
        @if ($status == true)
            <span
                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                Available
            </span>
        @else
            <span
                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                Unavailable
            </span>
        @endif

        <div class="flex gap-3 py-3">

            <?php sort($facility);
            
            // $uniqueFacilities = [];
            
            // // Sementara hapus duplikat
            // foreach ($facility as $facility_row) {
            //     if (!in_array($facility_row, $uniqueFacilities)) {
            //         $uniqueFacilities[] = $facility_row;
            //     }
            // }
            
            $uniqueFacilities = [];
            foreach ($facility as $facility_row) {
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
            
            ?>

            {{-- {{ $facility }} --}}
            @if (count($uniqueFacilities) <= 4)
                @foreach ($uniqueFacilities as $fac)
                    <x-feature-badge logo="{{ $fac['category'] }}" />
                @endforeach
            @else
                @for ($i = 0; $i <= 2; $i++)
                    <x-feature-badge logo="{{ $uniqueFacilities[$i]['category'] }}" />
                @endfor
                <x-feature-badge logo="{{ '+' . (count($uniqueFacilities) - 3) }}" />
            @endif



        </div>
    </div>
</div>
