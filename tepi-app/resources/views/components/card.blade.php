<div class="max-w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg h-64" src="images/rooms/Lab-202.jpg" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
        </a>
        <span
            class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
            Available
        </span>
        <span
            class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
            <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
            Unavailable
        </span>
        <div class="flex gap-3 py-3">
            <x-feature-badge logo="{{ $feature }}" />
            <x-feature-badge logo="{{ $feature }}" />
            <x-feature-badge logo="{{ $feature }}" />
            <x-feature-badge logo="{{ $feature }}" />


        </div>
    </div>
</div>
