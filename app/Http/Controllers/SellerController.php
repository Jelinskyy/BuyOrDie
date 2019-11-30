<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SellerController extends Controller
{
    public function index(User $user)
    {
        return view('seller/index', compact('user'));
    }
}
