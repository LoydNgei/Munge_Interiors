<x-admin.layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-gray-800 text-white p-4 h-full sm:h-auto">
            <x-admin.nav></x-admin.nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-2 bg-gray-100 p-6">
            <div class="bg-white shadow-md rounded-lg p-6 mx-auto max-w-4xl">
                <h1 class="font-semibold text-xl mb-4 text-center">Orders</h1>
                @if ($orders->isEmpty())
                    <p class="text-gray-500 text-center">No Orders yet!</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">User</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Total Amount</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Order Status</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->user }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->total_amount }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->order_status }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->payment_status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </main>
    </div>
    <x-admin.footer></x-admin.footer>
</x-admin.layout>
