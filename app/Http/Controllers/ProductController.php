<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Product;
use App\category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $categorys = category::all();
        return view('product/create', compact('categorys'));
    }

    public function store(){
        $items = category::all();
        $categorys = array();
        foreach($items as $item)
        {
            array_push($categorys, $item->name);
        }
        $data = request()->validate([
            'title' => 'required',
            'image' => ['required', 'image'],
            'description' => 'required',
            'price' => 'required',
            'category' => ['required', 'in:'.implode(",", $categorys)],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        auth()->user()->product()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $imagePath,
            'category' => $data['category'],
        ]);
        return redirect('/seller/'.auth()->user()->id);
    }

    public function show(Product $product){
        return view('product/show', compact('product'));
    }
}
