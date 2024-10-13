<x-layout>
    <x-navbar></x-navbar>

    <div class="container py-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold">Shipping Information</h2>
   

            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">
                    Delete
                </button>
            </form>
        </div>

        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="address" class="block text-sm font-medium">Billing Address</label>
                    <input type="text" name="address" id="address" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="cardnumber" class="block text-sm font-medium">Card Number</label>
                    <input type="number" name="cardnumber" id="cardnumber" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="cardnumber" class="block text-sm font-medium">Card Number</label>
                    <input type="number" name="cardnumber" id="cardnumber" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="cardnumber" class="block text-sm font-medium">Card Number</label>
                    <input type="number" name="cardnumber" id="cardnumber" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="cardnumber" class="block text-sm font-medium">Card Number</label>
                    <input type="number" name="cardnumber" id="cardnumber" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                
            </div>

           
            <div class="flex justify-end mt-6">
                <a href="" class="text-gray-500 mr-4">Cancel</a>
                <button type="submit" class="bg-primary text-white py-2 px-4 rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
    <x-footer></x-footer>
</x-layout>
