<!-- Navbar -->
<nav class="w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3 flex items-center justify-between">
        <!-- Logo and Menu Button -->
        <div class="flex items-center">
            <button 
                data-drawer-target="logo-sidebar" 
                data-drawer-toggle="logo-sidebar" 
                aria-controls="logo-sidebar"
                aria-label="Toggle sidebar"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 
                    focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 
                    dark:focus:ring-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>
<div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="h-full px-4 py-6">
            <ul class="space-y-4">
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Orders
                    </a>
                </li>
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Customers
                    </a>
                </li>
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Sales & Analytics
                    </a>
                </li>
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Payments
                    </a>
                </li>
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Discounts & Coupons
                    </a>
                </li>
                <li>
                    <a href="{{route('')}}" class="block px-4 py-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Settings
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-12">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Welcome to the Admin Dashboard</h1>
            <p class="text-gray-700 dark:text-gray-300">
                Here you can manage your application settings, view analytics, and perform administrative tasks.
            </p>
            <!-- Add more content here -->
        </div>
    </main>
</div>
