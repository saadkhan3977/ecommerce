<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Product::limit(8)->get();
        return view('index',$data);
    }
}
