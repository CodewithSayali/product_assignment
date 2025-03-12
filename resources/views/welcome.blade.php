<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Shopping Cart</h1>

        @if ($cartItems->isEmpty())
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <p class="text-gray-500 text-lg">Your cart is empty.</p>
            </div>
        @else
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="py-3 px-4 text-left">User Id</th>
                            <th class="py-3 px-4 text-left">Product Name</th>
                            <th class="py-3 px-4 text-left">Price</th>
                            <th class="py-3 px-4 text-left">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-4">{{ $item->user_id }}</td>
                                <td class="py-3 px-4">{{ $item->product->name }}</td>
                                <td class="py-3 px-4">${{ number_format($item->product->price, 2) }}</td>
                                <td class="py-3 px-4">{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>

</html>
