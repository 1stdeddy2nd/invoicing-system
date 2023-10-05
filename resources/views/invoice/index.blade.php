<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="flex gap-4">
                <a
                    href="{{ route('invoice.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded text-sm cursor-pointer"
                >
                    Add Invoice
                </a>
                <a
                    href="{{ route('invoice.print') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded text-sm cursor-pointer"
                >
                    Print
                </a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-center" style="width: 50px">No</th>
                                        <th scope="col" class="px-6 py-4">Customer Name</th>
                                        <th scope="col" class="px-6 py-4">Category</th>
                                        <th scope="col" class="px-6 py-4">Fruit</th>
                                        <th scope="col" class="px-6 py-4">Unit</th>
                                        <th scope="col" class="px-6 py-4">Price</th>
                                        <th scope="col" class="px-6 py-4">Quantity</th>
                                        <th scope="col" class="px-6 py-4">Amount</th>
                                        <th scope="col" class="px-6 py-4 text-center" style="width: 200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoices as $i => $invoice)
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium text-center">{{ $i+1 }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $invoice->user_name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $invoice->category_name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $invoice->fruit_name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $invoice->fruit_unit }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $invoice->fruit_price }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $invoice->qty }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $invoice->fruit_price * $invoice->qty }}</td>
                                            <td>
                                                <div class="flex justify-center items-center gap-4">
                                                    <a
                                                        href="{{ route('invoice.show', $invoice->id) }}"
                                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm cursor-pointer"
                                                    >
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST">
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
                                        <tr class="border-b dark:border-neutral-500">
                                            <td colspan="6"></td>
                                            <td class="whitespace-nowrap px-6 py-4">Total</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $total }}</td>
                                            <td></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
