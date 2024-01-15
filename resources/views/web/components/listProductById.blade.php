@extends('layouts.web')

@section('categories')
    @foreach ($categorys as $category)
        <li>
            <a href="{{ url('view-category/' . strtolower($category->id)) }}">{{ strtoupper($category->category_name) }}</a>
        </li>
    @endforeach
@endsection

@section('listProductById')
    <div class="col-12">
        <h2 class="mb-3 text-danger">All Products {{ $categoryName->category_name }}</h2>
    </div>
    @foreach ($productCategorys as $productCategory)
        <div class="col-md-4 col-lg-4">
            <div class="card my-3" style="height: 650px;">
                <form action="{{ route('addToCart', ['product' => $productCategory->id]) }}" method="post" class="d-flex flex-column" style="height: 100%">
                    @csrf
                    <a href="{{ url('detail/'. $productCategory->id) }}">
                        <div class="card-thumbnail">
                            <img src="{{ asset('storage/' . $productCategory->image) }}" width="100%" height="275" alt="{{ $productCategory->image }} class="img-fluid" alt="thumbnail" style="border-top-right-radius: 10px; border-top-left-radius: 10px">
                        </div>
                        <div class="card-body d-flex flex-column" style="height: 100vh;">
                            <h4 class="card-title">
                                <a href="#" class="text-secondary text-decoration-none">{{ $productCategory->name }}</a>
                            </h4>
                            <p class="card-text">
                                {{ $productCategory->description }}
                            </p>
                            <div class="mt-auto d-flex flex-row justify-content-between">
                                <p class="p-0 m-0 align-self-center">{{ number_format($productCategory->price, 0, ',', ',') }} VND</p>
                                <button type="submit" class="btn btn-danger">Add to cart</button>
                            </div>
                        </div>
                    </a>
                </form>
            </div>
        </div>
    @endforeach
@endsection
