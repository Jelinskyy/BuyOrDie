<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('product/create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'image' => ['required', 'image'],
            'description' => 'required',
            'price' => 'required'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        auth()->user()->product()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $imagePath,
        ]);
        return redirect('/seller/'.auth()->user()->id);
    }

    public function show(Product $product){
        return view('product/show', compact('product'));
    }
}
