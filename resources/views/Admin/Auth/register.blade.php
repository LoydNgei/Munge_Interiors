<x-admin.layout>
        <!-- login -->
        <div class="contain py-16">
            <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
                <h2 class="text-2xl uppercase font-medium mb-1">Register</h2>
                <form method="POST" action="{{ route('admin_register.post') }}" autocomplete="off">
                    @csrf
                    <div class="space-y-2">
                        <div>
                            <label for="username" class="text-gray-600 mb-2 block">Username</label>
                            <input type="username" name="username" id="username"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="username">
                        </div>
                        <div>
                            <label for="password" class="text-gray-600 mb-2 block">Password</label>
                            <input type="password" name="password" id="password"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="*******">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Register</button>
                    </div>
                </form>
                <p class="mt-4 text-center text-gray-600">Already have account?
                    <a href="/admin/login" class="text-primary">Login now</a>
                </p>
            </div>
        </div>
    <x-admin.footer></x-admin.footer>
</x-admin.layout>