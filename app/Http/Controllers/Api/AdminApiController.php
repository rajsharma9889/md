<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminApiController extends Controller
{
    public function check_admin(Request $request)
    {
        // return auth()->user();
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|integer|exists:admins,mobile_number',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first()
            ]);
        }
        $admin = Admin::where('mobile_number', $request->mobile_number)->first();
        return response()->json([
            'status' => true,
            'message' => $admin
        ]);
    }

    public function getprofile()
    {

        $admin = Auth::user();

        return response()->json([
            'status' => true,
            'data' => $admin
        ]);
    }
    public function logout()
    {

        $admin = Auth::user();
        $admin->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Admin logout successfully'
        ]);
    }
}
