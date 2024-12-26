<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            return view('home', compact('user'));
        } else {
            return redirect()->route('login')->with('error', 'Lütfen giriş yapınız.');
        }
    }
}
