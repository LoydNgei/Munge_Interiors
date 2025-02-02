<nav class="w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3 flex items-center justify-between">
        <div class="flex items-center">
            <button id = "menuButton" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" aria-label="Toggle sidebar"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 
                    focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 
                    dark:focus:ring-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <div class="flex text-white mb-6 space-x-6">
            <a href="#"><ul class ="block px-4 py-2 rounded-lg hover:bg-gray-100 text-white dark:hover:bg-gray-600">Home</ul></a>
            <a href="#"><ul class ="block px-4 py-2 rounded-lg hover:bg-gray-100 text-white dark:hover:bg-gray-600">Home</ul></a>
            <a href="#"><ul class ="block px-4 py-2 rounded-lg hover:bg-gray-100 text-white dark:hover:bg-gray-600">Home</ul></a>
            <a href="#"><ul class ="block px-4 py-2 rounded-lg hover:bg-gray-100 text-white dark:hover:bg-gray-600">Home</ul></a>
            {{-- <h2 class="">Welcome {{auth()->user()->username}}</h2> --}}
        </div>
    </div>
</nav> 
