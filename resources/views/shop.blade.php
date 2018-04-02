@extends('layouts.app')

@section('head')
    @parent
    <title>{{ config('app.name', 'The Fittest Warrior') }} | Shop</title>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div class="spacer-50"></div>
    <div id="shop">
        <div class="row">
            @foreach($products as $product)
                <div class="product">
                    <hr style="border: 2px solid #ccc;">
                    <h3>{{ $product->name }}</h3>
                    <img src="http://via.placeholder.com/100x100">
                    <p>Description: <br>{{ $product->description }}</p>
                    <h5>Product Details</h5>
                    <ul>
                        <li>Size: {{ $product->size }}</li>
                        <li>Price: ${{ $product->price }}</li>
                    </ul>
                    <button type="button" class="btn btn-dark">Add to Cart</button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="spacer-50"></div>
@endsection
@section('footer')
    @parent
@endsection