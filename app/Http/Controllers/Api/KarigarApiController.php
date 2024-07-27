<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karigar;
use App\Models\KarigarRequestList;
use App\Models\SubmitedForms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KarigarApiController extends Controller
{
    public function singup(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:karigars,name',
                'mobile_number' => 'required|integer|unique:karigars,mobile_number',
                'address' => 'required|string',
                'password' => 'required|string'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            // validation finish here

            $karigar = new Karigar;
            $karigar->mobile_number = $request->mobile_number;
            $karigar->name = $request->name;
            $karigar->address = $request->address;
            $karigar->password = Hash::make($request->password);
            $karigar->save();
            return response()->json([
                'status' => true,
                'data' => $karigar
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'error' => $th
            ]);
        }
    }


    public function check_karigar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|integer|exists:karigars,mobile_number',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first()
            ]);
        }
        // // validation finish here

        $karigar = Karigar::where('mobile_number', $request->mobile_number)->first();

        return response()->json([
            'status' => true,
            'data' => $karigar
        ]);
    }

    public function getprofile()
    {

        $karigar = Auth::user();
        return response()->json([
            'status' => true,
            'data' => $karigar
        ]);
    }

    public function logout()
    {
        $karigar = Auth::user();
        $karigar->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'logout successfully'
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

        $cat = SubmitedForms::where('status', $request->status)->get();
        return response()->json([
            'status' => true,
            'data' => $cat
        ]);
    }
    public function changeStatus(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required|integer|in:1,2,3',
                'category_id' => 'required|exists:categories,id',
                'form_id' => 'required|integer|exists:submited_forms,id'
                // 'user_id' => 'required|exists:users,id'
            ]);
            if ($request->status == 2) {
                $validator = Validator::make($request->all(), [
                    'reason' => 'required|string|',
                    'form_id' => 'required|integer|exists:submited_forms,id'
                ]);
            }
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first()
                ]);
            }
            $form = SubmitedForms::find($request->form_id);
            $req_list = KarigarRequestList::where('form_id', $request->form_id)->where('karigar_id', Auth::user()->id)->first();

            if ($request->status == 1) {
                $req_list->status = 1;
                $req_list->save();
                // Changing form status
                $form->status = '1';
                $form->save();
            }
            if ($request->status == 2) {
                $req_list->status = 2;
                $req_list->reason = $request->reason;
                $req_list->save();
            }
            if ($request->status == 3) {
                $req_list->status = 3;
                $req_list->save();
                $form->status = '2';
                $form->save();
            }

            return response()->json([
                'data' => [$form, $req_list]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => throw $th
            ]);
        }
    }
}
