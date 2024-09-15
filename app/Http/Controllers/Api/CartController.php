<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
        $data = Cart::all();

        return response()->json($data, 200);
    }

    public function addCart(Request $request)
    {
        $data = Cart::create([
            "img_1" => $request->img_1,
            "img_2" => $request->img_2,
            "img_3" => $request->img_3,
            "brand_name" => $request->brand_name,
            "brand_logo" => $request->brand_logo,
            "category" => $request->category,
            "name" => $request->name,
            "price" => $request->price,
            "discount" => $request->discount,
        ]);

        return response()->json($data, 200);
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return response()->json(null, 200);
    }
}
