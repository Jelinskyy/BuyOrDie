@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-11">
            <div class="card py-2 d-flex justify-content-centers">
                <div class="row d-flex justify-content-center">
                    @foreach ($shots as $shot)
                        @if (!empty($shot[0]))
                            <div class="col-{{ count($shot)*3 }} mx-4 mt-3">
                            <div class="bod-text-wrap bod-h3 col-12 d-flex justify-content-center">{{ $categorys[$loop->index] }}</div>
                                <div class="row d-flex justify-content-center">
                                    @foreach ($shot as $prod)
                                        <div class="col-{{ 10/count($shot) }} p-1 mx-2 bod-b-1 h-100">
                                            <div class="bod-bg-white bod-bb-r-1 bod-bt-r-1 h-100">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a href="/p/{{$prod->id}}"><img src="/storage/{{$prod->image}}" class="w-100 bod-bt-r-1"></a>
                                                    </div>
                                                    <div class="bod-text-wrap bod-h1 col-12 mx-2 mt-1">
                                                        {{ $prod->title }}
                                                    </div>
                                                    <div class="bod-text-wrap bod-h2 col-12 mx-2">
                                                        {{ $prod->price }}$
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if (!empty($products))
                        <div class="col-12 bod-h3 d-flex justify-content-center mt-4">Recomended</div>
                        @foreach ($products as $prod)
                            <div class="col-3 p-1 mx-2 bod-b-1">
                                <div class="bod-bg-white bod-bb-r-1 bod-bt-r-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="/p/{{$prod->id}}"><img src="/storage/{{$prod->image}}" class="w-100 bod-bt-r-1"></a>
                                        </div>
                                        <div class="bod-h1 bod-text-wrap col-12 mx-2 mt-1">
                                            {{ $prod->title }}
                                        </div>
                                        <div class="bod-h2 bod-text-wrap col-12 mx-2">
                                            {{ $prod->price }}$
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($loop->index%3 == 1) <div class="col-12"></div> @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
