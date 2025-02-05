<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Management') }}
        </h2>
        <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h1 class="text-center text-2xl font-bold mb-6">Manage Orders</h1>
                <p class="text-center mb-6">Here you can view, process, or cancel orders.</p>
                
                <!-- Display Orders (Placeholder) -->
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Order ID</th>
                            <th class="px-4 py-2 text-left">Product</th>
                            <th class="px-4 py-2 text-left">Quantity</th>
                            <th class="px-4 py-2 text-left">Price</th>
                            <th class="px-4 py-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example order -->
                        <tr>
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Product A</td>
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">$20</td>
                            <td class="px-4 py-2"><a href="#" class="text-blue-600 hover:text-blue-800">Edit</a> | <a href="#" class="text-red-600 hover:text-red-800">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
