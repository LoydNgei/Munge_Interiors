<x-admin.layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-gray-800 text-white p-4 min-h-screen sm:h-auto">
            <x-admin.nav></x-admin.nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6">
            <div class="bg-white shadow-md rounded-lg p-6 mx-auto max-w-4xl">
                <h1 class="font-semibold text-xl mb-6 text-center">Manage Products</h1>
                
                <!-- Add New Product Form -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mb-8">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="product_name" class="block text-gray-600">Name</label>
                            <input type="text" id="product_name" name="product_name" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label for="product_price" class="block text-gray-600">Price</label>
                            <input type="number" id="product_price" name="product_price" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label for="product_quantity" class="block text-gray-600">Quantity</label>
                            <input type="number" id="product_quantity" name="product_quantity" class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label for="product_size" class="block text-gray-600">Size</label>
                            <input type="text" id="product_size" name="product_size" class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label for="product_colour" class="block text-gray-600">Color</label>
                            <input type="text" id="product_colour" name="product_colour" class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label for="product_image" class="block text-gray-600">Image</label>
                            <input type="file" id="product_image" name="product_image" class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="col-span-2">
                            <label for="product_description" class="block text-gray-600">Description</label>
                            <textarea id="product_description" name="product_description" class="w-full border rounded px-3 py-2" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-500">Add Product</button>
                </form>

                <!-- Display Existing Products -->
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
    </div>
    <x-admin.footer></x-admin.footer>
</x-admin.layout>
