<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Admin;
use App\Models\Karigar;
use App\Models\PrivecyPolicy;
use App\Models\TermAndCondition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            if (Auth::guard('admin')->attempt($request->only('mobile_number', 'password'))) {
                $admin = Auth::guard('admin')->user();
                $token = $admin->createToken('admin', ['admin'])->plainTextToken;

                return response()->json([
                    'status' => true,
                    'data' => $admin,
                    'token' => $token
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Password not matched',
            ]);
        }
        if ($request->role == 2) {
            // inserting karigar start
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|integer|exists:karigars,mobile_number',
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
            if ($karigar) {
                if (!$karigar->status) {
                    return response()->json([
                        'status' => false,
                        'massage' => 'You are prohibated by Admin.'

                    ]);
                }
                if (Hash::check($request->password, $karigar->password)) {
                    $token = $karigar->createToken('karigar-token', ['karigar'])->plainTextToken;
                    return response()->json([
                        'status' => true,
                        'data' => $karigar,
                        'token' => $token
                    ]);
                }
            }


            // If password not matched
            return response()->json([
                'status' => false,
                'message' => 'Password not matched or user not found'
            ]);
        }
        if ($request->role == 3) {
            // inserting user start
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|integer|exists:users,mobile_number',
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
            if (!$user->status) {
                return response()->json([
                    'status' => false,
                    'massage' => 'You are prohibated by Admin.'

                ]);
            }
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('user-token', ['user'])->plainTextToken;
                return response()->json([
                    'status' => true,
                    'data' => $user,
                    'token' => $token
                ]);
            }

            // If password not matched 
            return response()->json([
                'status' => false,
                'message' => 'Password not matched'
            ]);
        }
    }
    public function change_password(Request $request)
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
                'new_password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            // validation finish here

            $admin = Admin::where('mobile_number', $request->mobile_number)->first();
            $admin->password = Hash::make($request->new_password);
            $admin->save();
            return response()->json([
                'status' => true,
                'message' => 'Password changed successfully'
            ]);
        }
        if ($request->role == 2) {
            // inserting user start
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|integer|exists:karigars,mobile_number',
                'new_password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            // validation finish here

            $karigar = Karigar::where('mobile_number', $request->mobile_number)->first();
            $karigar->password = Hash::make($request->new_password);
            $karigar->save();
            return response()->json([
                'status' => true,
                'message' => 'Password changed successfully'
            ]);
        }
        if ($request->role == 3) {
            // inserting user start
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|integer|exists:users,mobile_number',
                'new_password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            // validation finish here

            $user = User::where('mobile_number', $request->mobile_number)->first();
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Password changed successfully'
            ]);
        }
    }

    public function pages(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required|integer|in:1,2,3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first()
            ]);
        }

        if ($request->type == 1) {
            $term = TermAndCondition::first();
            return response()->json([
                'status' => true,
                'data' => $term
            ]);
        }
        if ($request->type == 2) {
            $policy = PrivecyPolicy::first();
            return response()->json([
                'status' => true,
                'data' => $policy
            ]);
        }
        if ($request->type == 3) {
            $aboutus = AboutUs::first();
            return response()->json([
                'status' => true,
                'data' => $aboutus
            ]);
        }
    }
}
