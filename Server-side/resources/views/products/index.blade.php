@extends('layouts.master')
@section('title', 'Prodcuts')

@section('product')
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div
            class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-boxes mr-3 text-primary-600"></i>
                    Product List
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage your inventory and product details</p>
            </div>
            <button type="button" data-action="show"
                class="text-white cursor-pointer text-center bg-blue-700 hover:bg-blue-800 rounded-lg font-semibold text-md px-5 py-2.5 me-2 mb-2">
                <a href="{{ route('product.create') }}">
                    Add New Product
                    <i class="fa-solid fa-plus px-3"></i>
                </a>
            </button>
        </div>
        <!-- Products Table -->
        <div class="overflow-x-auto">
            <!-- ✅ Include your table here -->
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium">N <sup>0</sup></th>
                        <th class="px-6 py-3 text-left font-medium">Image</th>
                        <th class="px-6 py-3 text-left font-medium">Name</th>
                        <th class="px-6 py-3 text-left font-medium">Price</th>
                        <th class="px-6 py-3 text-left font-medium">Stock</th>
                        <th class="px-6 py-3 text-left font-medium">Status</th>
                        <th class="px-6 py-3 text-left font-medium">Sell-Date</th>
                        <th class="px-6 py-3 text-right font-medium text-red-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($products as $index => $product)
                        <tr class="product-row hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-4 py-2">
                                <div class="font-medium">{{ $index + 1 }}</div>
                            </td>
                            <td class="px-4 py-2">
                                <img src="{{ asset($product->image) }}" alt="Product Image"
                                    class="w-20 h-20 object-contain rounded">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                        <div class="font-medium">{{ $product->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                        <div class="font-medium">${{ $product->price }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                        <div class="font-medium">{{ $product->quantity }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $product->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-200 text-blue-800">
                                    {{ $product->sell_date }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    {{-- button update --}}
                                    <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600">
                                        <a href="{{ route('product.edit', $product->id) }}">
                                            {!! icon_edit() !!}
                                        </a>
                                    </button>
                                    {{-- button delete --}}
                                    <div x-data="{ showDelete: false }">
                                        <!-- Delete Button -->
                                        <button @click="showDelete = true"
                                            class=" btn-deleted p-2 rounded-lg hover:bg-gray-100 text-gray-600 transition">
                                            <a>{!! icon_delete() !!}</a>
                                        </button>
                                        {{-- Include Delete Card --}}
                                        <div x-show="showDelete" x-transition style="display: none;"
                                            class="transform absolute top-0 left-1/3 ">
                                            @include('products.buttonDelete')
                                        </div>
                                    </div>
                                    {{-- button  --}}
                                    <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-11 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center">
                <p class="text-sm text-gray-600 mb-4 sm:mb-0">
                    Showing
                    <span class="font-medium">{{ $products->firstItem() }}</span>
                    to
                    <span class="font-medium">{{ $products->lastItem() }}</span>
                    of
                    <span class="font-medium">{{ $products->total() }}</span>
                    results
                </p>

                <!-- Laravel pagination links styled with Tailwind -->
                <div class="mt-2 sm:mt-0">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- check logint --}}
{{-- @if (session('sweet-alert'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('alert-message') }}",
            });

        });
    </script>
@endif --}}

@if (Session::has('sweet-alert'))
    <x-sweet-alert icon="success" :message="session('alert-message')" />
@endif

{{-- push script --}}
@push('btnDelete')
    {{-- Add this in your layout or at the bottom of index.blade.php --}}
    <script src="{{ asset('js/product-delete.js') }}"></script>
@endpush
