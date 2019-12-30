<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class RatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function store(Product $product, $value)
    {
        if($value==1 || $value==2 || $value==3 || $value==4 || $value==5)
        {
            auth()->user()->rateing()->detach($product);
            auth()->user()->rateing()->attach($product, ['rate'=>$value]);
            return auth()->user()->rateing()->withPivot(['rate', 'product_id'])->where('product_id', $product->id)->pluck('rate')->first();
        }else
        {
            return 0;
        }
    }
}
