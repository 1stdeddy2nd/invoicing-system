<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <form action="{{ route('invoice.store') }}" method="POST">
                @csrf

                <h1 class="mb-4">Form Add Invoice</h1>

                <div class="mb-3">
                    <label for="user_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Select a User:</label>
                    <select name="user_id" id="user_id" class="block mt-1 w-full text-xs">
                        <option value="">All Users</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{$user->id}} - {{ $user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="fruit_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Select a Fruit:</label>
                    <select name="fruit_id" id="fruit_id" class="block mt-1 w-full text-xs">
                        <option value="">All Fruits</option>
                        @foreach($fruits as $fruit)
                            <option value="{{ $fruit->id }}">{{ $fruit->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('fruit_id')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <x-input-label for="qty">Quantity</x-input-label>
                    <x-text-input id="qty" name="qty" class="block mt-1 w-full text-xs" type="number" min="0" />
                    <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded text-sm cursor-pointer">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
