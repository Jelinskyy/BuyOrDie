@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="/storage/{{ $product->image }}" class="w-100">
                        </div>

                        <div class="col-6">
                            <h1>{{ $product->title }}</h1>
                            <h2>from <a href="/seller/{{$product->user->id}}">{{ $product->user->name }}</a></h2>

                            <h1 class="py-3">{{ $product->price }}$</h1>

                        <rate-stars rate='{{ $rate }}' ratecount='{{ $rateCount }}' actualy='{{ $actualy }}' productid='{{ $product->id }}'></rate-stars>

                            <hr>
                            <p>Category: {{ $product->category }}</p>
                            <p>{{ $product->description }}</p>
                            <hr>

                            <div style="height: 6vh;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
