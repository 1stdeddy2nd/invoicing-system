<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <form action="{{ route('fruit.update', $fruit->id) }}" method="POST">
                <h1 class="mb-4">Edit Fruit {{ $fruit->name }}</h1>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="category_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Select a Category:</label>
                    <select name="category_id" id="category_id" class="block mt-1 w-full text-xs">
                        <option value="">All Categories</option>
                        @foreach($category as $data)
                            <option value="{{ $data->id }}" {{ ( $data->id == $fruit->category_id) ? 'selected' : '' }}>{{ $data->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <x-input-label for="name">Name</x-input-label>
                    <x-text-input id="name" name="name" class="block mt-1 w-full text-xs" type="text" value="{{ $fruit->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <x-input-label for="price">Price</x-input-label>
                    <x-text-input id="price" name="price" class="block mt-1 w-full text-xs" type="number" min="0" step="1000" value="{{ $fruit->price }}" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <x-input-label for="unit">Unit</x-input-label>
                    <x-text-input id="unit" name="unit" class="block mt-1 w-full text-xs" type="text" value="{{ $fruit->unit }}" />
                    <x-input-error :messages="$errors->get('unit')" class="mt-2" />
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded text-sm cursor-pointer">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
