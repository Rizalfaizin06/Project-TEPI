<nav aria-label="Page navigation example">
    <ul class="flex items-center -space-x-px h-10 text-base">
        <li>
            <a href="{{ $currentpage - 1 > 0 ? '?page=' . $currentpage - 1 : '' }}"
                class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                @if ($currentpage <= 1) disabled @endif>
                <span class="sr-only">Previous</span>
                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
            </a>
        </li>
        @for ($i = max(1, $currentpage - 2); $i <= min($lastpage, $currentpage + 2); $i++)
            <li>
                <a href="?page={{ $i }}"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $currentpage == $i ? 'z-10 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : '' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        <li>
            <a href="{{ $currentpage + 1 <= $lastpage ? '?page=' . $currentpage + 1 : '' }}"
                class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                @if ($currentpage >= $lastpage) disabled @endif>
                <span class="sr-only">Next</span>
                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </a>
        </li>
    </ul>
</nav>
