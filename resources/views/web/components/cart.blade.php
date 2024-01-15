<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @include('web.components.navbar-header')
        </nav>

        <main class="py-4">
            <div class="container">
                <h1 class="text-center mb-3">Cart</h1>
                <div class="table-responsive shopping-cart">
                    <table class="table">
                        <thead class="table-success">
                            <tr>
                                <th class="align-middle"><h5 class="m-0 p-2">Image</h5></th>
                                <th class="text-center align-middle"><h5 class="m-0 p-2">Product Name</h5></th>
                                <th class="text-center align-middle"><h5 class="m-0 p-2">Price</h5></th>
                                <th class="text-center align-middle"><h5 class="m-0 p-2">Quantity</h5></th>
                                <th class="text-center align-middle"><h5 class="m-0 p-2">Total Price</h5></th>
                                <th class="text-center align-middle"><h5 class="m-0 p-2">Action</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach($cart as $product)
                                <tr>
                                    <td>
                                        <div class="product-item">
                                            <a class="product-thumb align-content-center" href="#"><img src="{{ asset('storage/' . $product['image']) }}" width="100px" height="100px" alt="Product"></a>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">{{ $product['name'] }}</td>
                                    <td class="text-center align-middle">{{ number_format($product['price'], 0, ',', ',') }} VND</td>
                                    <td class="text-center text-lg text-medium align-middle">{{ $product['quantity'] }}</td>
                                    <td class="text-center text-lg text-medium align-middle">{{ number_format($product['quantity'] * $product['price'], 0, ',', ',') }} VND</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('removeFromCart', ['productId' => $product['id']]) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="remove-from-cart" data-toggle="tooltip" title="" data-original-title="Remove item">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @php
                                    $subtotal += $product['quantity'] * $product['price'];
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="margin-bottom: 40px">
                    <h3 class="m-0 float-end">{{ number_format($subtotal, 0, ',', ',') }} VND</h3>
                </div>
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <a href="/" class="btn btn-outline-secondary">Back to Shopping</a>
                    </div>
                    <form action="{{ route('createOrder') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Check out</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
