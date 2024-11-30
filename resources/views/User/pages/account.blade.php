<x-user.layout>
    <x-user.navbar></x-user.navbar>
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Account</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- account wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

        <!-- sidebar -->
        <div class="col-span-3">
            <div class="px-4 py-3 shadow flex items-center gap-4">
                <div class="flex-shrink-0">
                  {{--  <img src="{{ Auth::user()->avatar ?? '../assets/images/avatar.png' }}" alt="profile"
                         class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover"> --}}
                </div>
                <div class="flex-grow">
                    <p class="text-gray-600">Hello,</p>
                    <h4 class="text-gray-800 font-medium">{{ Auth::user()->name }}</h4> 
                </div>
            </div>
        </div>
        <!-- ./sidebar -->

        <!-- info -->
        <div class="col-span-9 grid grid-cols-3 gap-4">

            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Personal Profile</h3>
                    <a href="#" class="text-primary">Edit</a>
                </div>
                <div class="space-y-1">
                    <p class="text-gray-600"> {{ Auth::user()->name }}</p> 
                    <p class="text-gray-600"> {{ Auth::user()->email }}</p> 
                </div>
            </div>

            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Shipping address</h3>
                    <a href="#" class="text-primary">Edit</a>
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">{{ Auth::user()->shipping_address->name ?? 'N/A' }}</h4> <!-- Display shipping name -->
                    <p class="text-gray-800">{{ Auth::user()->shipping_address->address ?? 'N/A' }}</p> <!-- Display shipping address -->
                    <p class="text-gray-800">{{ Auth::user()->shipping_address->zipcode ?? 'N/A' }}</p> <!-- Display shipping zipcode -->
                    <p class="text-gray-800">{{ Auth::user()->shipping_address->phone ?? 'N/A' }}</p> <!-- Display shipping phone -->
                </div>
            </div>

            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                  <h3 class="font-medium text-gray-800 text-lg">Billing Information</h3>
                  <a href="{{ route('billing.show') }}" class="text-primary">Edit</a> </div>
                <div class="space-y-1">
                  @if(Auth::user()->billing)
                    <p class="text-gray-800">{{ Auth::user()->billing->billing_address ?? 'N/A' }}</p>
                    <p class="text-gray-800">{{ Auth::user()->billing->user_card_number ?? 'N/A' }}</p>
                  @else
                    <p class="text-gray-600">No billing information found. Please add your billing information below.</p>
                  @endif
                </div>
              </div>

        </div>
        <!-- ./info -->

    </div>
    <!-- ./account wrapper -->

    <x-user.footer></x-user.footer>
</x-user.layout>
