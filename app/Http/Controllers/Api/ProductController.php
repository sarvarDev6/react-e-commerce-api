<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ProductController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/product",
     *     summary="Get a list of products",
     *     tags={"Products"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */

    public function viewProduct()
    {
        $data = Products::all();

        return response()->json($data, 200);
    }

    public function addProduct(Request $request)
    {
        $data = Products::create([
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

    public function updateProduct(Request $request, $id)
    {
        $product = Products::find($id);

        $product->update([
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

        return response()->json(null, 200);
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id);

        $product->delete();

        return response()->json(null, 200);
    }
}
