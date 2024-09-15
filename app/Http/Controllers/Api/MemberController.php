<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MemberController extends Controller
{

    public function adminGetMembersAccess()
    {
        $data = Member::all();

        return response()->json($data, 201);
    }

    public function register(Request $request)
    {
        if (strlen($request->password) < 6) {
            return response()->json([null, false, "the password should be under 6 characters !", 400]);
        }
        $data = Member::create([
            "fullname" => $request->fullname,
            "phone" => $request->phone,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([$data, true, "User Added Successfully !", 200]);
    }

    public function login(Request $request)
    {
        if (strlen($request->password) < 6) {
            return response()->json([null, false, "the password should be under 6 characters !", 400]);
        }

        $check_members = Member::where("phone", $request->phone)->first();

        if ($check_members == null) {
            return response()->json([null, false, "User Not Found", 400]);
        }

        if (!Hash::check($request->password, $check_members->password)) {
            return response()->json([null, false, "Password is incorrect", 400]);
        }

        $token = Str::random(20);


        $check_members->update([
            "token" => $token
        ]);

        return response()->json([$check_members, true, "User Successfully Logged in !", 200]);
    }

    public function get_members()
    {

        $check_members = Member::where("token", $this->getToken())->first();
        if ($check_members == null) {
            return response()->json([null, false, "Member Not Found !", 400]);
        }

        return response()->json([$check_members, true, "", 200]);
    }
}