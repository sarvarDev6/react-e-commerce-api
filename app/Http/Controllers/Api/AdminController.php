<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdmins()
    {
        $data = Admins::all();

        return response()->json($data, 200);
    }

    public function addAdmins(Request $request)
    {
        $data = Admins::create([
            "name" => $request->name,
            "password" => $request->password
        ]);

        return response()->json($data, 200);
    }

    public function updateAdmins(Request $request, $id)
    {
        $admins = Admins::find($id);

        $admins->update([
            "name" => $request->name,
            "password" => $request->password
        ]);

        return response()->json(null, 200);
    }

    public function deleteAdmins($id)
    {
        $admins = Admins::find($id);

        $admins->delete();

        return response()->json(null, 200);
    }
}
