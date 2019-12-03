<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class SellerController extends Controller
{
    public function index(User $user)
    {
        return view('seller/index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('seller/edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->seller);

        $data = request()->validate([
            'description' => 'required',
            'image' => 'image',
        ]);

        if(request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->seller->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/seller/".auth()->user()->id);
    }
}
