<div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500">
            <tr>
                @foreach ($headers as $header)
                    <th class="px-6 py-3 text-left font-medium">{{ $header }}</th>
                @endforeach
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
                            class="w-20 h-20 object-cover rounded">
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
                                <a href="{{ route('product.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
                            </button>
                            {{-- button delete --}}
                            <div x-data="{ showDelete: false }">
                                <!-- Delete Button -->
                                <button @click="showDelete = true"
                                    class=" btn-deleted p-2 rounded-lg hover:bg-gray-100 text-gray-600 transition">
                                    <a><i class="fas fa-trash text-xl"></i></a>
                                </button>
                                {{-- Include Delete Card --}}
                                <div x-show="showDelete" x-transition style="display: none;"
                                    class="transform absolute top-0 left-1/3 ">
                                    @include('components.buttonDelete')
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
</div>
