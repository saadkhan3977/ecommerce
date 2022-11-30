<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\VeriantSize;
use App\Models\VeriantColor;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Product::limit(8)->get();
        return view('index',$data);
    }
    
    public function product_detail($id)
    {
        $data['product'] = Product::find($id);
        $data['size'] = VeriantSize::where('product_id',$id)->first();
        // return json_decode($size->name); 
        $data['color'] = VeriantColor::where('product_id',$id)->first();
        return view('product_detail',$data);
    }
}
