<x-admin.layout>
    <div class="flex h-screen">
        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6">
            <div class="bg-white shadow-md rounded-lg p-6 mx-auto max-w-4xl">
                @if ($products->isEmpty())
                    <p class="text-gray-500 text-center">No products available</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Quantity</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $product->product_name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">${{ $product->product_price }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $product->product_quantity }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </main>
        <div class="flex items-center">
            <a href="{{route('products.viewform')}}">
                <button>Post products</button>
            </a>
        </div>
    </div>
</x-admin.layout>
