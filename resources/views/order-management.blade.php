<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h1 class="text-center text-2xl font-bold mb-6">Manage Orders</h1>
                <p class="text-center">Here you can view, process, or cancel orders.</p>
                <!-- Add your content here -->
            </div>
        </div>
    </div>
</x-app-layout>
