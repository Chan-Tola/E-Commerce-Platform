@extends('components.header')
{{--  in the lessson teacher show it in the input form --}}
{{-- button I want to show that  card so I need to using with ajax --}}
<div class="w-full max-w-md p-4 bg-[#F8F9FA] border border-gray-300 rounded-lg shadow-sm sm:p-8">
    <!-- ❌ Close Button -->
    <button @click="showDelete = false"
        class="absolute top-1 right-2 text-gray-500 hover:text-black text-2xl font-bold focus:outline-none">
        &times;
    </button>
    <div class=" text-center items-baseline text-gray-900 dark:text-white">
        <span class="text-2xl  font-extrabold tracking-tight text-gray-600">Are you sure want to delete
            ?</span>
    </div>
    <ul role="list" class="space-y-5 my-7">
        <li class="flex items-center">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">ID :
                {{ $product->id }} </span>
        </li>
        <li class="flex items-center">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Name :
                {{ $product->name }} </span>
        </li>
        <li class="flex">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Price : $
                {{ $product->price }} </span>
        </li>
        <li class="flex">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Stock:
                {{ $product->quantity }}</span>
        </li>
        <li class="flex">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Status :
                {{ $product->status }}</span>
        </li>
        <li class="flex">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Sell-Date :
                {{ $product->sell_date }}</span>
        </li>
        <li class="flex decoration-gray-500 dark:text-gray-400 ms-3">
            {{-- {{ asset($product->image) }} --}}
            <img src="{{ asset($product->image) }}" alt="Product Image" class="w-24 h-24 object-cover rounded">
        </li>

    </ul>
    <button type="button" data-remove-id = "{{ $product->id }}" id="btn-deleted"
        class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-200 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">
        Delete</button>
</div>
