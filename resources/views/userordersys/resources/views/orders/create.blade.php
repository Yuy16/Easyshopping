<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Customer Information -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                                    <input type="text" 
                                           name="customer_name" 
                                           id="customer_name" 
                                           value="{{ old('customer_name') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           required>
                                    @error('customer_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="customer_email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" 
                                           name="customer_email" 
                                           id="customer_email"
                                           value="{{ old('customer_email') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           required>
                                    @error('customer_email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="customer_phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input type="tel" 
                                           name="customer_phone" 
                                           id="customer_phone"
                                           value="{{ old('customer_phone') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           required>
                                    @error('customer_phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="customer_address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                                    <textarea name="customer_address" 
                                              id="customer_address"
                                              rows="2"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                              required>{{ old('customer_address') }}</textarea>
                                    @error('customer_address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Order Items</h3>
                            <div id="order-items" class="space-y-4">
                                <div class="order-item grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div class="md:col-span-2">
                                        <!-- Product Selection Dropdown with Categories -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Product</label>
                                            <select name="items[0][product_id]" 
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    required>
                                                <option value="">Select a product</option>
                                                
                                                <!-- Writing Tools -->
                                                <optgroup label="Writing Tools">
                                                    <option value="1" data-price="2.50">Ballpoint Pen - RM 2.50</option>
                                                    <option value="2" data-price="4.80">Mechanical Pencil - RM 4.80</option>
                                                    <option value="6" data-price="8.70">Highlighter Set - RM 8.70</option>
                                                </optgroup>
                                                
                                                <!-- Paper Products -->
                                                <optgroup label="Paper Products">
                                                    <option value="3" data-price="6.20">Notebook A5 - RM 6.20</option>
                                                    <option value="4" data-price="15.90">Hardcover Diary - RM 15.90</option>
                                                    <option value="9" data-price="5.60">Sticky Notes Pack - RM 5.60</option>
                                                </optgroup>
                                                
                                                <!-- Office Supplies -->
                                                <optgroup label="Office Supplies">
                                                    <option value="7" data-price="12.50">Stapler - RM 12.50</option>
                                                    <option value="8" data-price="4.20">Staples Box - RM 4.20</option>
                                                </optgroup>
                                                
                                                <!-- Correction Supplies -->
                                                <optgroup label="Correction Supplies">
                                                    <option value="5" data-price="3.50">Correction Tape - RM 3.50</option>
                                                </optgroup>
                                                
                                                <!-- Measuring Tools -->
                                                <optgroup label="Measuring Tools">
                                                    <option value="10" data-price="2.30">Ruler 30cm - RM 2.30</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Quantity</label>
                                        <input type="number" 
                                               name="items[0][quantity]" 
                                               min="1"
                                               value="1"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                               required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Subtotal</label>
                                        <input type="text" 
                                               class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm"
                                               readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="button" 
                                        id="add-item"
                                        class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Add Another Item
                                </button>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="bg-gray-50 p-4 rounded-lg" x-data="orderSummary()">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Order Summary</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span id="subtotal" x-text="'RM ' + subtotal.toFixed(2)">RM 0.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax (10%):</span>
                                    <span id="tax" x-text="'RM ' + tax.toFixed(2)">RM 0.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Shipping:</span>
                                    <span id="shipping">RM 10.00</span>
                                </div>
                                <div class="pt-2 border-t border-gray-200 flex justify-between">
                                    <span class="text-lg font-medium text-gray-900">Total:</span>
                                    <span id="total" x-text="'RM ' + total.toFixed(2)">RM 10.00</span>
                                </div>
                            </div>

                            <!-- Order ID Section -->
                            <div x-show="orderGenerated" class="mt-4 bg-green-50 p-3 rounded-md">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h4 class="text-green-800 font-semibold">Order Generated</h4>
                                        <p class="text-green-700 text-sm">Your Order ID is: <span x-text="generatedOrderId"></span></p>
                                    </div>
                                    <a :href="'/orders/' + generatedOrderId" 
                                       class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        View Order
                                    </a>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 flex justify-between">
                                <a href="{{ route('orders.index') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Cancel
                                </a>
                                <button 
                                    x-show="!orderGenerated"
                                    @click.prevent="generateOrderId"
                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                    Proceed to Order
                                </button>
                            </div>
                        </div>

                        @push('scripts')
                        <script>
                            function orderSummary() {
                                return {
                                    subtotal: 0,
                                    tax: 0,
                                    total: 10,
                                    orderGenerated: false,
                                    generatedOrderId: '',

                                    calculateTotals() {
                                        const items = document.querySelectorAll('.order-item');
                                        this.subtotal = 0;

                                        items.forEach(item => {
                                            const select = item.querySelector('select');
                                            const quantity = item.querySelector('input[type="number"]');

                                            if (select && select.value) {
                                                const option = select.options[select.selectedIndex];
                                                const price = parseFloat(option.dataset.price);
                                                this.subtotal += price * quantity.value;
                                            }
                                        });

                                        this.tax = this.subtotal * 0.1;
                                        this.total = this.subtotal + this.tax + 10; // 10 is shipping
                                    },

                                    generateOrderId() {
                                        // Simulate order ID generation 
                                        const prefix = 'ORD-' + new Date().toISOString().slice(0,10).replace(/-/g,'');
                                        const randomNum = Math.floor(1000 + Math.random() * 9000);
                                        this.generatedOrderId = `${prefix}-${randomNum}`;
                                        this.orderGenerated = true;

                                        // Optional: You might want to send this to the server to actually create the order
                                        this.submitOrder();
                                    },

                                    submitOrder() {
                                        const form = document.querySelector('form');
                                        const formData = new FormData(form);

                                        fetch('{{ route("orders.store") }}', {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-Requested-With': 'XMLHttpRequest',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                this.generatedOrderId = data.orderId;
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                        });
                                    },

                                    init() {
                                        // Calculate totals when the page loads
                                        this.calculateTotals();

                                        // Recalculate totals when items change
                                        const orderItems = document.getElementById('order-items');
                                        orderItems.addEventListener('change', () => this.calculateTotals());
                                        orderItems.addEventListener('input', () => this.calculateTotals());
                                    }
                                }
                            }
                        </script>
                        @endpush
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orderItems = document.getElementById('order-items');
            const addItemButton = document.getElementById('add-item');
            let itemCount = 1;

            // Add new item
            addItemButton.addEventListener('click', function() {
                const newItem = orderItems.children[0].cloneNode(true);
                const inputs = newItem.querySelectorAll('input, select');
                
                inputs.forEach(input => {
                    input.name = input.name.replace('[0]', `[${itemCount}]`);
                    if (input.type !== 'number') {
                        input.value = '';
                    }
                });

                orderItems.appendChild(newItem);
                itemCount++;
            });

            // Event listeners for changes
            orderItems.addEventListener('change', function() {
                const orderSummary = document.querySelector('[x-data="orderSummary()"]');
                orderSummary.__x.$data.calculateTotals();
            });
            orderItems.addEventListener('input', function() {
                const orderSummary = document.querySelector('[x-data="orderSummary()"]');
                orderSummary.__x.$data.calculateTotals();
            });
        });
    </script>
    @endpush
</x-app-layout>