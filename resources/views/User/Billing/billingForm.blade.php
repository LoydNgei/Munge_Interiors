<x-user.layout>
    <x-user.navbar></x-user.navbar>

    <div class="container py-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold">Billing Information</h2>
            @if($billing)
                <form action="{{ route('billing.destroy', $billing->billing_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
            @endif
        </div>

        <form action="{{ isset($billing) ? route('billing.update', $billing->billing_id) : route('billing.store') }}" method="POST">
            @csrf
            @if(isset($billing))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="address" class="block text-sm font-medium">Billing Address</label>
                    <input type="text" name="billing_address" id="address" value="{{ $billing->billing_address ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="cardnumber" class="block text-sm font-medium">Card Number</label>
                    <input type="number" name="user_card_number" id="cardnumber" value="{{ $billing->user_card_number ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{route('billing.show')}}" class="text-gray-500 mr-4">Cancel</a>
                <button type="submit" class="bg-primary text-white py-2 px-8 rounded">
                    {{ isset($billing) ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>
    </div>

    <x-user.footer></x-user.footer>
</x-user.layout>