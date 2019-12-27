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

                            <h3>4,8<i class="icon-star" style="margin-left: 1vw;"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-empty"></i></h3>

                            <hr>
                            <p>Category: {{ $product->category }}</p>
                            <p>{{ $product->description }}</p>
                            <hr>

                            <div style="height: 6vh;"></div>

                            <table style="height: 100%; width: 100%; position: absolute; left: 0; top: 0;">
                                <tbody>
                                    <tr>
                                        <td class="align-bottom"><div class="w-100 d-flex justify-content-end"><button class="btn btn-light align-bottom">Dodaj do koszyka</button></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
