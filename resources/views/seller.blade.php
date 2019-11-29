@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center pb-4">
        <div class="col-1">
            <img src="\img\floor-tile.png" class="rounded-circle" style="max-height:6vw; border: 3px solid #000;">
        </div>
        <div class="col-2 pt-4">
            <h1 style="color: #000;" class="my-0">{{ $user->name }}</h1>
            <h3 style="color: #000;" class="my-0">{{ $user->seller->description }}</h3>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">

                <div class="card-body justify-content-center">
                    <div class="row">
                        <div class="col-1 justify-content-center">
                            <img src="\img\floor-tile.png" class="" style="max-height:6vw">
                        </div>
                        <div class="col-8">
                            <h2>None item awaible. We are sorry :'(</h2>
                            <b><a href="#">admin</a></b>
                        </div>
                        <div class="offset-2 col-1 justify-content-right">
                            <h3>30.99$</h3>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-1 justify-content-center">
                            <img src="\img\floor-tile.png" class="" style="max-height:6vw">
                        </div>
                        <div class="col-8">
                            <h2>None item awaible. We are sorry :'(</h2>
                            <b><a href="#">admin</a></b>
                        </div>
                        <div class="offset-2 col-1 justify-content-right">
                            <h3>30.99$</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
