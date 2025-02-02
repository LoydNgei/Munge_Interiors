<x-admin.layout>
    <div class="flex h-screen">
        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6">
            <div class="bg-white shadow-md rounded-lg p-6 mx-auto max-w-4xl">
                <h1 class="font-semibold text-xl mb-6 text-center">Manage Products</h1>
                <!-- Add New Product Form -->
                <form action="{{ route('products.view') }}" method="POST" enctype="multipart/form-data" class="mb-8">
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
                    <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 text-black rounded shadow hover:bg-blue-500">Add Product</button>
                </form>
            </div>
        </main>
    </div>
</x-admin.layout>