@extends('layouts.web')

@section('categories')
@foreach ($categorys as $category)
<li>
    <a href="{{ url('view-category/' . strtolower($category->id)) }}">{{ strtoupper($category->category_name) }}</a>
</li>
@endforeach
@endsection

@section('listProduct')
@foreach ($products as $product)
<div class="col-md-4 col-lg-4 my-3" style="height: 650px;">
    <div class="card" style="height: 100%">
        <form action="{{ route('addToCart', ['product' => $product->id]) }}" method="post" class="d-flex flex-column"
            style="height: 100%">
            @csrf
            <a href="{{ url('detail/'. $product->id) }}">
                <div class="card-thumbnail">
                    <img src="{{ asset('storage/' . $product->image) }}" width="100%" height="275"
                        alt="{{ $product->image }} class=" img-fluid" alt="thumbnail"
                        style="border-top-right-radius: 10px; border-top-left-radius: 10px">
                </div>
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">
                        <a href="#" class="text-secondary text-decoration-none">{{ $product->name }}</a>
                    </h4>
                    <p class="card-text">
                        {{ $product->description }}
                    </p>
                    <div class="mt-auto d-flex flex-row justify-content-between">
                        <p class="p-0 m-0 align-self-center">{{ number_format($product->price, 0, ',', ',') }} VND</p>
                        <button type="submit" class="btn btn-danger">Add to cart</button>
                    </div>
                </div>
            </a>
        </form>
    </div>
</div>
@endforeach
@endsection