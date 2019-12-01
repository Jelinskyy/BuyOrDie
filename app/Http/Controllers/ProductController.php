<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

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
            'description' => 'required',
            'price' => 'required'
        ]);

        auth()->user()->product()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);
        return redirect('/seller/'.auth()->user()->id);
    }
}
