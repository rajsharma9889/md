<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SubmitedForms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function loginIndex(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|string|exists:admins,mobile_number',
                'password' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }


            $admin = Admin::where('mobile_number', $request->mobile_number)->first();

            if ($admin) {
                if (Hash::check($request->password, $admin->password)) {
                    $request->session()->put('admin_id', $admin->id);
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Wrong Password');
                }
            }
        }
        //  Post request end
        $page_data['page_title'] = 'Admin Login';
        return view('admin.login', compact('page_data'));
    }
    public function dashboardIndex(Request $request)
    {
        $page_data['page_title'] = 'Admin Dashboard';
        return view('admin.admin_dashboard', compact('page_data'));
    }
    public function requestsIndex(Request $request, $status = null, $id = null)
    {
        if ($status == 'pending') {
            $dataQuery = SubmitedForms::where('status', '0')->with('category', 'user');

            // dd($dataQuery);
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'Pending Requests';
        } elseif ($status == 'accept') {
            $dataQuery = SubmitedForms::where('status', '1')->with('category', 'user');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'Accept Requests';
        } elseif ($status == 'reject') {
            $dataQuery = SubmitedForms::with('category', 'user')->where('status', '2');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'Reject Requests';
        } else {
            $dataQuery = SubmitedForms::with('category', 'user');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'All Requests';
        }
        return view('admin.user_requests', compact('page_data'));
    }
}
