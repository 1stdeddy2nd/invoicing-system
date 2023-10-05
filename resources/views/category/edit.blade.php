<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                <h1 class="mb-4">Edit Category {{ $category->name }}</h1>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <x-input-label for="name">Name</x-input-label>
                    <x-text-input id="name" name="name" class="block mt-1 w-full text-xs" type="text" value="{{ $category->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded text-sm cursor-pointer">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
