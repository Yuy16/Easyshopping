<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Order Details') }} #{{ $order->id }}
            </h2>
            <div class="flex items-center space-x-3">
                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                    {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                    {{ ucfirst($order->status) }}
                </span>
                @if($order->status !== 'completed')
                    <a href="{{ route('orders.edit', $order) }}" 
                       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Edit Order
                    </a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Order Summary -->
                <div class="lg:col-span-2 bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Order Items
                        </h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($order->orderItems as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $item->product->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">
                                                    {{ $item->quantity }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <div class="text-sm text-gray-500">
                                                    ${{ number_format($item->unit_price, 2) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <div class="text-sm font-medium text-gray-900">
                                                    ${{ number_format($item->quantity * $item->unit_price, 2) }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-gray-50">
                                        <td colspan="3" class="text-right px-6 py-3 text-sm font-medium text-gray-500">
                                            Subtotal
                                        </td>
                                        <td class="text-right px-6 py-3 text-sm font-bold text-gray-900">
                                            ${{ number_format($order->subtotal, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right px-6 py-3 text-sm font-medium text-gray-500">
                                            Tax (10%)
                                        </td>
                                        <td class="text-right px-6 py-3 text-sm font-bold text-gray-900">
                                            ${{ number_format($order->tax, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right px-6 py-3 text-sm font-medium text-gray-500">
                                            Shipping
                                        </td>
                                        <td class="text-right px-6 py-3 text-sm font-bold text-gray-900">
                                            ${{ number_format($order->shipping, 2) }}
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td colspan="3" class="text-right px-6 py-3 text-lg font-bold text-gray-500">
                                            Total
                                        </td>
                                        <td class="text-right px-6 py-3 text-lg font-bold text-gray-900">
                                            ${{ number_format($order->total_amount, 2) }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Customer and Order Information -->
                <div class="space-y-6">
                    <!-- Customer Details -->
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Customer Information
                            </h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <div class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $order->customer_name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $order->customer_email }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $order->customer_phone }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Delivery Address</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $order->customer_address }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Tracking -->
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Order Tracking
                            </h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <div class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Order Date</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $order->created_at->format('M d, Y H:i A') }}
                                    </dd>
                                </div>
                                @if($order->updated_at != $order->created_at)
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $order->updated_at->format('M d, Y H:i A') }}
                                        </dd>
                                    </div>
                                @endif
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Payment Status</dt>
                                    <dd class="mt-1 text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('orders.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Orders
                </a>
                @if($order->status === 'pending')
                    <form action="{{ route('orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="processing">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Start Processing
                        </button>
                    </form>
                @endif
                @if($order->status === 'processing')
                    <form action="{{ route('orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Mark as Completed
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
