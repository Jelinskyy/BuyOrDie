<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Cache;

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

            Cache::remember(
                'product.rate.' . $product->id,
                now()->addSeconds(30),
                function () use($product) { return round($product->rates()->withPivot('rate')->pluck('rate')->avg(),2); }
            );

            Cache::remember(
                'product.rate.count.' . $product->id,
                now()->addSeconds(30),
                function () use($product) { return count($product->rates()->get()->toArray()); }
            );

            return $value;
        }else
        {
            return 0;
        }
    }
}
