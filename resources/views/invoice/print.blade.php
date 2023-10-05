<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fruit Invoice App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
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
</html>
