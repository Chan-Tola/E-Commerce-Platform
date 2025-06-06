<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold text-center mb-6">All Products</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Image</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Qty</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Sell Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                class="w-20 h-20 object-cover rounded">
                        </td>
                        <td class="px-4 py-2 font-semibold">{{ $product->name }}</td>
                        <td class="px-4 py-2">${{ $product->price }}</td>
                        <td class="px-4 py-2">{{ $product->quantity }}</td> <!-- Fixed here -->
                        <td class="px-4 py-2">{{ $product->status }}</td>
                        <td class="px-4 py-2">{{ $product->sell_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


</html>
