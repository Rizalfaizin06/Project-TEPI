{{-- <div>

    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class="text-white bg-primary hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800"
        type="button">All Status<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Available</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Unavailable</a>
            </li>

        </ul>
    </div>
</div> --}}
{{-- {{ $values }} --}}
<select id="statusDropdown" name="status"
    class="text-white bg-primary hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">


    @foreach ($values as $key => $value)
        <option value="{{ $key }}" {{ $params == $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach

    {{-- <option value="All Status" {{ $params == 'All Status' ? 'selected' : '' }}>All
        Status</option>
    <option value="Available" {{ $params == 'Available' ? 'selected' : '' }}>Available
    </option>
    <option value="Unavailable" {{ $params == 'Unavailable' ? 'selected' : '' }}>
        Unavailable</option> --}}
</select>

{{-- @php
    var_dump($values);
@endphp --}}
