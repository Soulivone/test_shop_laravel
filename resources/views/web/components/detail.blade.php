@extends('layouts.web')

@section('detail')
    <form action="{{ route('addToCart', ['product' => $detailProduct->id]) }}" method="post">
        @csrf
        <div class="d-flex justify-content-between">
            <img src="{{ asset('storage/' . $detailProduct->image) }}" width="45%" height="" alt="{{ $detailProduct->image }}">

            <div class="w-50 d-flex flex-column" style="margin: 7rem 0">
                <h4 class="text-secondary">
                    {{ $detailProduct->name }}
                </h4>
                <p class="">
                    {{ $detailProduct->description }}
                </p>
                <span style="margin-top: 130px">Quantity: {{ $detailProduct->quantity }}</span>
                <div class="mt-auto d-flex flex-row justify-content-between">
                    <p class="p-0 m-0 align-self-center">{{ number_format($detailProduct->price, 0, ',', ',') }} VND</p>
                    <button type="submit" class="btn btn-danger">Add to cart</button>
                </div>
            </div>
        </div>
    </form>
@endsection
