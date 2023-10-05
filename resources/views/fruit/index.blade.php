<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <a
                href="{{ route('fruit.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded text-sm cursor-pointer"
            >
                Add Fruit
            </a>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-center" style="width: 50px">No</th>
                                        <th scope="col" class="px-6 py-4">Name</th>
                                        <th scope="col" class="px-6 py-4">Category</th>
                                        <th scope="col" class="px-6 py-4">Price</th>
                                        <th scope="col" class="px-6 py-4">Unit</th>
                                        <th scope="col" class="px-6 py-4 text-center" style="width: 200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fruits as $i => $fruit)
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium text-center">{{ $i+1 }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $fruit->name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $fruit->category_name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $fruit->price }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $fruit->unit }}</td>
                                            <td>
                                                <div class="flex justify-center items-center gap-4">
                                                    <a
                                                        href="{{ route('fruit.show', $fruit->id) }}"
                                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm cursor-pointer"
                                                    >
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('fruit.destroy', $fruit->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
