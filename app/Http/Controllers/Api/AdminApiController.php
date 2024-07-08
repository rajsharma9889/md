<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminApiController extends Controller
{
    public function check_admin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|integer|exists:admins,mobile_number',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first()
            ]);
        }
        // // validation finish here

        $admin = Auth::user();

        return response()->json([
            'status' => true,
            'data' => $admin
        ]);

    }
    public function getprofile(Request $request)
    {

        $admin = Auth::user();

        return response()->json([
            'status' => true,
            'data' => $admin
        ]);

    }
}
