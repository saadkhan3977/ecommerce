<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Cart;

class CheckoutController extends Controller
{

    public function addcart(Request $request)
    {
         $id = $request->id;
        // $product = Product::findOrFail($id);
        // if(Auth::check())
        // {
        //     $userid = Auth::user()->id;
        //     $carts =  Cart::where(['user_id'=>$userid,'product_id'=>$id])->first();
        //     // if($carts)
        //     // {
        //     //     $carts->update([
        //     //         'product_id'=>$id,
        //     //         'quantity'=>1,
        //     //         'product_price'=> $product->regular_price,
        //     //         'total'=>$product->regular_price,
        //     //         'user_id'=>$userid,
        //     //     ]);
        //     // }
        //     // else
        //     // {
        //     //     Cart::create([
        //     //         'product_id'=>$id,
        //     //         'quantity'=>1,
        //     //         'product_price'=> $product->regular_price,
        //     //         'total'=>$product->regular_price,
        //     //         'user_id'=>$userid,
        //     //     ]);
        //     // }
        // }
        // $cart = session()->get('cart', []);
  
        // // if(isset($cart[$id])) {
        // //     $cart[$id]['quantity']++;
        // // } else {
        // //     $cart[$id] = [
        // //         "name" => $product->name,
        // //         "quantity" => 1,
        // //         "price" => $product->price,
        // //         "image" => $product->image
        // //     ];
        // // }
        
        // // session()->put('cart', $cart);
        
        // return response()->json(['success'=> 'Product added to cart successfully!']);
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        if (0 > $product->stock) {
            return redirect()->back()->with('error', 'Quantity stock is not avialable');
        }
        // $id = $product->id;
        $user = session()->get('userid');
        if ($user == null) {
            if (auth()->user()) {
                $userid = auth()->user()->id;
            } else {
                $userid = rand();
            }
            session()->put('userid', $userid);
        } else {
            $userid = $user;
        }

        $cart = Cart::where(['product_id' => $id, 'user_id' => $userid])->first();
        if ($cart != null) {
            $quant = $cart->quantity;
            $quantity = $quant + 1;
            $cart->quantity = $quantity;
            $cart->total = $product->regular_price * $cart->quantity;

            $cart->save();
            return response()->json(['success'=> 'Product added to cart successfully!']);
            // return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {
            Cart::create([
                'user_id' => $userid,
                'product_id' => $id,
                'quantity' => 1,
                "product_price" => $product->regular_price,
                "total" => $product->regular_price,
            ]);
            
            return response()->json(['success'=> 'Product added to cart successfully!']);
            // return  redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    public function ajaxcart()
    {
        $userid = session()->get('userid');
        $data['total'] =  Cart::where(['user_id'=>$userid])->sum('total');
        $data['carts'] =  Cart::where(['user_id'=>$userid])->count();
        return $data ;
    }
    public function cart()
    {
        
        $userid = session()->get('userid');
        $data['cart'] =  Cart::where(['user_id'=>$userid])->get();
        $data['total'] =  Cart::where(['user_id'=>$userid])->sum('total');
        return view('cart',$data);
    }
    
    public function updatecart(Request $request)
    {
        // return $request->type ;
        if ($request->id and $request->quant) {
            $userid = session()->get('userid');
            
            $cart = Cart::where(['id' => $request->id, 'product_id' => $request->product_id, 'user_id' => $userid])->first();
            if ($cart) {
                if($request->type == 'plus')
                {
                    $cart->quantity = $request->quant;
                    $cart->total = $cart->product_price * $cart->quantity;
                    $cart->save(); 
                }else{
                    $quant =  $request->quant;
                    $cart->quantity = $quant;
                    $cart->total = $cart->product_price * $cart->quantity;
                    $cart->save();
                }
                
                return response()->json(['success'=> 'Cart updated successfully']);
            } else {
                return response()->json(['error'=> 'Something Went Wrong']);
            }
        }
    }
    
    public function deletecart(Request $request)
    {
        Cart::find($request->id)->delete();
        return response()->json(['success'=> 'Product Remove From Cart Successfully']);
    }
    
}
