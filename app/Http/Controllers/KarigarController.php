<?php

namespace App\Http\Controllers;

use App\Models\Karigar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KarigarController extends Controller
{
    public function karigarIndex(Request $request, $status = null, $id = null)
    {

        $dataQuery = Karigar::query();
        if ($request->has('true')) {
            $perPage = $request->input('pageLimit', 10);
            $searchFilter = $request->input('searchFilter');

            if ($searchFilter !== "") {
                $dataQuery->search($searchFilter);
            }

            $data = $dataQuery->paginate($perPage);
            return response()->json($data);
        }
        if ($status == 'change_status') {
            $karigar = Karigar::find($id);
            $karigar->status = !$karigar->status;
            $karigar->save();
            return back()->with('success', 'Karigar Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'mobile_number' => 'required|integer',
                'address' => 'required|string',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $karigar = new Karigar;

            $karigar->name = $request->name;
            $karigar->mobile_number = $request->mobile_number;
            $karigar->address = $request->address;
            $karigar->password = Hash::make($request->password);
            $karigar->save();
            return back()->with('success', 'Karigar added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'mobile_number' => 'required|integer',
                'address' => 'required|string',


            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $karigar = Karigar::find($request->id);
            $karigar->name = $request->name;
            $karigar->mobile_number = $request->mobile_number;
            $karigar->address = $request->address;
            $karigar->save();
            return back()->with('success', 'Karigar updated successfully.');
        }

        $page_data['page_title'] = 'Karigar';
        return view('admin.karigar', compact('page_data'));
    }
}
