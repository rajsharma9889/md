<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    public function singup(Request $request)
    {
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

        $user = new User;
        $user->mobile_number = $request->mobile_number;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status' => true,
            'data' => $user
        ]);


    }
}
