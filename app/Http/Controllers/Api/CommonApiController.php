<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Karigar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CommonApiController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:1,2,3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first()
            ]);
        }
        // checking role end
        if ($request->role == 1) {
            // inserting Admin start
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|integer|exists:admins,mobile_number',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            // validation finish here

            $admin = Admin::where('mobile_number', $request->mobile_number)->first();
            if (Hash::check($request->password, $admin->password)) {
                return response()->json([
                    'status' => true,
                    'data' => $admin
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Password not matched'
            ]);

        }
        if ($request->role == 2) {
            // inserting user start
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|integer|unique:karigars,mobile_number',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            // validation finish here

            $karigar = Karigar::where('mobile_number', $request->mobile_number)->first();
            if (Hash::check($request->password, $karigar->password)) {
                return response()->json([
                    'status' => true,
                    'data' => $karigar
                ]);
            }

            // If password not matched
            return response()->json([
                'status' => false,
                'message' => 'Password not matched'
            ]);


        }
        if ($request->role == 3) {
            // inserting user start
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|integer|unique:users,mobile_number',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            // validation finish here

            $user = User::where('mobile_number', $request->mobile_number)->first();
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            }

            // If password not matched
            return response()->json([
                'status' => false,
                'message' => 'Password not matched'
            ]);


        }

    }
}
