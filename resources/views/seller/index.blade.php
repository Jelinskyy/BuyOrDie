@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center pb-4">
        <div class="col-1">
            <img src="\img\floor-tile.png" class="rounded-circle" style="max-height:6vw; border: 0.4vw solid #000;">
        </div>
        <div class="col-2">
            <h1 style="color: #000;" class="my-0">{{ $user->name }}</h1>
            <h2 style="color: #000;" class="my-0">{{ $user->seller->description }}</h2>
        </div>
        @can('update', $user->seller)
            <div class="col-2">
                <div class="row pb-2">
                    <button onclick="window.location.href='/p/create'" class="btn btn-light">Add Auction</button>
                </div>

                <div class="row">
                    <button onclick="window.location.href='/seller/edit'" class="btn btn-light">Edit Profile</button>
                </div>
            </div>
        @endcan

    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">

                <div class="card-body justify-content-center">
                    @foreach ($user->product as $product)
                        <div class="row auction">
                            <div class="col-1 justify-content-center">
                                <img src="\img\floor-tile.png" style="max-height:6vw">
                            </div>
                            <div class="col-8">
                                <h2>{{ $product->title }}</h2>
                                <h1><b><a href="/seller/{{ $user->id }}">{{ $user->name }}</a></b></h1>
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <h3>{{ $product->price }}$</h3>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
