<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function viewOrder()
    {
        $data = Order::all();

        return response()->json($data, 200);
    }

    public function addOrder(Request $request)
    {
        $data = Order::create([
            'name' => $request->name,
            'product_img' => $request->product_img,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'region' => $request->region,
            'aggree_with_pay' => $request->aggree_with_pay,
            'phone' => $request->phone,
            'order_comment' => $request->order_comment,
        ]);

        return response()->json($data, 200);
    }

    public function deleteOrder($id)
    {
        $data = Order::find($id);

        $data->delete();

        return response()->json($data, 200);
    }
}
