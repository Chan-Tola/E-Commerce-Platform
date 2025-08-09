@extends('layouts.master')
@section('title', 'Product Detail')
{{-- yield--}}
@section('product-details')
    <main class="bg-gray-100 shadow-md rounded-lg p-2">
        <section class="flex items-center justify-between mb-4 mt-6">
            <h2 class="text-2xl font-semibold text-gray-900">Product Details</h2>
            <button type="button" data-title="Create Product-Detail" data-action="show"
                data-modal-url="{{ route('productdetail.create') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Create
            </button>
        </section>
        <section class="p-2">
            <div class="relative overflow-x-auto shadow-xl sm:rounded-lg mt-6 bg-gray-50">
                <table class="w-full text-base text-left text-gray-800">
                    <thead class="text-base text-gray-800 uppercase border-b-2">
                        <tr>
                            <th scope="col" class="px-6 py-3">Image</th>
                            <th scope="col" class="px-6 py-3">Product Name</th>
                            <th scope="col" class="px-6 py-3">Unit Price</th>
                            <th scope="col" class="px-6 py-3">Admin Notes</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productDetails as $index => $detail)
                            <tr class="bg-gray-50 border-b  border-gray-100 hover:bg-gray-100">
                                <td class="p-4">
                                    @if ($detail->product && $detail->product->image)
                                        <img src="{{ asset($detail->product->image) }}" alt="Product Image"
                                            class="w-32 h-32 object-cover rounded" />
                                    @else
                                        <div
                                            class="w-32 h-32 bg-gray-200 dark:bg-gray-600 flex items-center justify-center text-gray-500 rounded">
                                            No Image
                                        </div>
                                    @endif
                                </td>
                                {{-- <td class="px-6 py-4 font-semibold text-gray-900">
                                    {{ $detail->id }}
                                </td> --}}
                                <td class="px-6 py-4 font-semibold text-gray-900">
                                    {{ $detail->product->name }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900">
                                    ${{ number_format($detail->unit_price, 2) }}
                                </td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $detail->admin_notes ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <button data-title="Edit Product-Detail" data-action="show"
                                        data-modal-url="{{ route('productdetail.edit', $detail->id) }}"
                                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Edit
                                    </button>
                                    <button data-title="Are you sure want to delete" data-action="show"
                                        data-modal-url="{{ route('productdetail.delete', $detail->id) }}"
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Delete
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </section>
        {{-- sectin modal --}}
        <section>
            <!-- Modal Backdrop -->
            <div id="createStatusModal"
                class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
                <!-- Modal Container -->
                <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 lg:w-1/3 shadow-lg rounded-md bg-white">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t">
                        <h5 class="text-xl font-semibold text-gray-900" id="createStatusModalLabel"></h5>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center"
                            onclick="closeModal()">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="p-6 space-y-6">
                        <!-- This is where place for dynamic modal show -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- scope js --}}
    <script src="{{ asset('js/custome.js') }}"></script>
    @if (session('alert_message'))
        <x-sweet-alert :type="session('alert_type', 'success')" :message="session('alert_message')" :title="null" />
    @endif
    @if ($errors->any())
        <x-sweet-alert type= "Oops..." :message="Something went wrong!" />
    @endif

    <script>
        // JavaScript functions to show/hide modal
        function showModal() {
            document.getElementById('createStatusModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createStatusModal').classList.add('hidden');
        }
        // Close modal when clicking outside
        document.getElementById('createStatusModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>

@endsection
