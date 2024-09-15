<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MainSliders;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function viewSlider()
    {
        $data = MainSliders::all();

        return response()->json($data, 200);
    }

    public function addSlider(Request $request)
    {
        $data = MainSliders::create([
            "img" => $request->img
        ]);

        return response()->json($data, 200);
    }

    public function updateSlider(Request $request, $id)
    {
        $slider = MainSliders::find($id);

        $slider->update([
            "img" => $request->img
        ]);

        return response()->json(null, 200);
    }

    public function deleteSlider($id)
    {
        $slider = MainSliders::find($id);

        $slider->delete();

        return response()->json(null, 200);
    }
}
