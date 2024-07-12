<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Dandi;
use App\Models\GazeSize;
use App\Models\HomeBanner;
use App\Models\Kunda;
use App\Models\Latkan;
use App\Models\Purity;
use App\Models\Size;
use App\Models\SubmitedForms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function check_user(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|integer|exists:users,mobile_number',
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


    public function getprofile()
    {

        $user = Auth::user();
        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }
    public function dashboard()
    {
        $banner = HomeBanner::all();
        $category = Category::all();

        return response()->json([
            'status' => true,
            'banner' => $banner,
            'category' => $category
        ]);
    }
    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'logout successfully'
        ]);
    }
    public function forget_password()
    {
        $user = Auth::user();


        return response()->json([
            'status' => true,
            'message' => 'logout successfully'
        ]);
    }

    public function getCategory()
    {
        $category = Category::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $category

        ]);
    }
    public function purity()
    {

        $purity = Purity::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $purity

        ]);
    }
    public function color()
    {

        $color = Color::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $color

        ]);
    }
    public function dandi()
    {

        $dandi = Dandi::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $dandi

        ]);
    }
    public function kunda()
    {

        $kunda = Kunda::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $kunda

        ]);
    }
    public function size()
    {

        $size = Size::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $size

        ]);
    }
    public function gaze_size()
    {

        $gaze_size = GazeSize::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $gaze_size

        ]);
    }
    public function weight()
    {

        $weight = GazeSize::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $weight

        ]);
    }
    public function latkan()
    {

        $latkan = Latkan::whereStatus(1)->get();
        return response()->json([
            'status' => true,
            'data' => $latkan

        ]);
    }
    public function formSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id',
            'colors' => 'string',
            'dandis' => 'string',
            'gaze_sizes' => 'string',
            'genders' => 'string',
            'kundas' => 'string',
            'latkans' => 'string',
            'purities' => 'string',
            'sizes' => 'string',
            'weights' => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first()
            ]);
        }

        $sub_cat = new SubmitedForms;
        $sub_cat->category_id = $request->category_id;
        $sub_cat->user_id = $request->user_id;
        $sub_cat->colors = $request->colors ?? null;
        $sub_cat->dandis = $request->dandis ??  null;
        $sub_cat->gaze_sizes = $request->gaze_sizes ??  null;
        $sub_cat->genders = $request->genders ??  null;
        $sub_cat->kundas = $request->kundas ??  null;
        $sub_cat->latkans = $request->latkans ??  null;
        $sub_cat->purities = $request->purities ??  null;
        $sub_cat->sizes = $request->sizes ??  null;
        $sub_cat->weights = $request->weights ??  null;
        $sub_cat->save();


        return response()->json([
            'status' => true,
            'data' => $sub_cat

        ]);
    }
    public function checkCat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|integer|in:0,1,2',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first()
            ]);
        }
        $user = Auth::user();
        $cat = SubmitedForms::where('user_id', $user->id)->where('status', $request->status)->get();

        return response()->json([
            'status' => true,
            'data' => $cat
        ]);
    }
}
