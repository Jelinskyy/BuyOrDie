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
                    <form method="post" enctype="multipart/form-data" action="/p">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 col-10  m-auto">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Title" autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-10 m-auto">
                                    <textarea class = "form-control light @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Descripton" autocomplete="description" name="description" rows="5"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-10  m-auto">
                                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <div class="col-md-6 col-10  m-auto">
                                    <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" autocomplete="category" autofocus>
                                        @foreach ($categorys as $item)
                                            <option>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-10  m-auto">
                                    <input id="price" type="number" step="0.01" min="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Price" autocomplete="price" autofocus>

                                    @error('price')
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
