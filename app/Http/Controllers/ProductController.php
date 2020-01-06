<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Product;
use App\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    public function index(){
        $shots = array();
        $ids = array();
        foreach(category::all()->pluck('name') as $cat)
        {
            array_push($shots, DB::table('products')->where('category', $cat)->paginate(2));
        }
        foreach($shots as $shot)
        {
            foreach($shot->pluck('id') as $id)
            {
                array_push($ids, $id);
            }
        }
        $categorys = Cache::remember(
            'category.list',
            now()->addSeconds(600),
            function () {return category::all()->pluck('name')->toArray();}
        );
        $products = DB::table('products')->whereNotIn('id', $ids)->latest()->paginate(15);
        return view('product/index', compact('products', 'shots', 'categorys'));
    }

    public function create(){
        $categorys = category::all();
        return view('product/create', compact('categorys'));
    }

    public function store(){
        $items = category::all()->pluck('name')->toArray();
        $data = request()->validate([
            'title' => 'required',
            'image' => ['required', 'image'],
            'description' => 'required',
            'price' => 'required',
            'category' => ['required', 'in:'.implode(",", $items)],
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
        $rate = Cache::remember(
            'product.rate.' . $product->id,
            now()->addSeconds(30),
            function () use($product) { return round($product->rates()->withPivot('rate')->pluck('rate')->avg(),2); }
        );
        $actualy = auth()->user()->rateing()->withPivot(['rate', 'product_id'])->where('product_id', $product->id)->pluck('rate')->first();
        return view('product/show', compact('product', 'rate', 'actualy'));
    }
}
