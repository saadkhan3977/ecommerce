<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;

class CheckoutController extends Controller
{

    public function addcart(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        if(Auth::check())
        {
            $userid = Auth::user()->id;
            $carts =  Cart::where(['user_id'=>$userid,'product_id'=>$id])->first();
            if($carts)
            {
                $carts->update([
                    'product_id'=>$id,
                    'quantity'=>1,
                    'product_price'=> $product->regular_price,
                    'total'=>$product->regular_price,
                    'user_id'=>$userid,
                ]);
            }
            else
            {
                Cart::create([
                    'product_id'=>$id,
                    'quantity'=>1,
                    'product_price'=> $product->regular_price,
                    'total'=>$product->regular_price,
                    'user_id'=>$userid,
                ]);
            }
        }
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        
        session()->put('cart', $cart);
        
        return response()->json(['success'=> 'Product added to cart successfully!']);
    }

    public function ajaxcart()
    {
        if(Auth::check())
        {
            $userid = Auth::user()->id;
            return $carts =  Cart::where(['user_id'=>$userid])->count();
            
        }
        else
        {
            $cart = session()->get('cart');
            return ($cart) ? count($cart) : 0 ;
        }
    }
    public function cart()
    {
        if(Auth::check())
        {
            $userid = Auth::user()->id;
            $data['cart'] =  Cart::where(['user_id'=>$userid])->count();
            
        }
        else
        {
            $data['cart'] = session()->get('cart');
        }
        return view('cart',$data);
    }
}
