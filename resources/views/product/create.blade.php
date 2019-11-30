@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h1 style="color:rgba(0, 0, 0, 0.55)">Create Auction</h1>
                </div>
                <div class="card-body">
                        <form method="POST">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-6 col-10  m-auto">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Title" required autocomplete="title" autofocus>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <div class="col-md-6 col-10 m-auto">
                                            <textarea class = "form-control light @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Descripton" required autocomplete="description" name="description" rows="5"></textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                            <button class="btn btn-light m-auto">Add New Post</button>
                                    </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
