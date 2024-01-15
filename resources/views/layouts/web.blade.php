<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TEST SHOP</title>

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
                @if (!request()->is('login'))
                <div class="d-flex mb-2">
                    <h5><a href="/" class="web-index text-black text-decoration-none me-3">TRANG CHỦ</a></h1>
                        <h5><a href="/contact" class="web-index text-black text-decoration-none me-3">LIÊN HỆ</a>
                        </h5>
                        <h5><a href="/des" class="web-index text-black text-decoration-none me-3">GIỚI THIỆU</a>
                        </h5>
                </div>
                <div class="row justify-content-center">
                    @if(request()->is('detail/*'))
                    <div class="col-12">
                        <div class="container">
                            @switch(true)
                            @case(request()->is('/'))
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="mb-3 text-danger">All Products</h2>
                                </div>

                                @yield('listProduct')
                            </div>
                            @break

                            @case(request()->is('contact'))
                            @include('web.components.contact')
                            @break

                            @case(request()->is('des'))
                            @include('web.components.des')
                            @break

                            @case(request()->is('detail/*'))
                            @yield('detail')
                            @break
                            @endswitch
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-3">
                    <div class="col-md-12 sidebar_box">
                        <div class="sidebar">
                            <div class="menu_box">
                                <h3 class="menu_head">TEST SHOP</h3>
                                <ul class="menu">
                                    @yield('categories')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="container">
                        @switch(true)
                        @case(request()->is('/'))
                        <div class="row">
                            <div class="col-12">
                                <h2 class="mb-3 text-danger">All Products</h2>
                            </div>

                            @yield('listProduct')
                        </div>
                        @break

                        @case(request()->is('contact'))
                        @include('web.components.contact')
                        @break

                        @case(request()->is('des'))
                        @include('web.components.des')
                        @break

                        @case(request()->is('view-category/*'))
                        <div class="row">
                            @yield('listProductById')
                        </div>
                        @break
                        @endswitch
                    </div>
                </div>
                @endif
                @else
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @if (request()->is('login'))
                        @yield('loginpage')
                        @endif

                        @if (request()->is('cart'))
                        @yield('cart')
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </main>
    </div>
</body>

</html>
