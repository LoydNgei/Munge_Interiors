<header>
    <nav class="bg-gray-800">
        <div class="flex items-end justify-between flex-grow md:pl-12 py-5">
            <div class="flex items-center space-x-6 capitalize">
                <a href="{{url('/')}}" class="text-gray-200 hover:text-white transition">Home</a>
                <a href="{{url('shop')}}" class="text-gray-200 hover:text-white transition">Shop</a>
                <a href="{{url('about')}}" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="{{url('contact')}}" class="text-gray-200 hover:text-white transition">Contact us</a>
                {{-- <a href="{{url('/admin/login')}}" class="text-gray-200 hover:text-white transition">Admin</a> --}}
                <a href="{{url('logout')}}" class="text-gray-200 hover:text-white transition">Logout</a>
            </div>
            <div>
                <h3 class="text-gray-200 hover:text-white transition p-4">Welcome {{auth()->user()->name}}</h3>
            </div>
        </div>
    </nav> 
    <div class="container flex items-center justify-between py-4 shadow-sm bg-white">
        {{-- LOGO --}}
        <a href="{{ url('/') }}">
            <img src="{{asset('images/logo.png') }}" alt="Logo" class="w-32">
        </a>

        {{-- SEARCH FUNCTION --}}
        <div class="w-full max-w-xl relative flex">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" name="search" id="search"
                class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
                placeholder="search">
            <button
                class="bg-primary border border-primary text-white px-8 py-4 rounded-r-md hover:bg-transparent hover:text-primary transition hidden md:flex">Search</button>
        </div>

        {{-- WISHLIST & CART --}}
        <div class="flex items-center space-x-6">
            <a href="{{ url('wishlist') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="text-xs leading-3">Wishlist</div>
                <div class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
                    8
                </div>
            </a>

            <a href="{{ url('checkout') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div class="text-xs leading-3">Cart</div>
                <div class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
                    2
                </div>
            </a>
            <a href="{{ url('account') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="text-xs leading-3">Account</div>
            </a>
        </div>
    </div>
</header>