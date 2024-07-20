<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KarigarRequestList;
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

        if ($status == 'change_status_accept') {
            $sub_form = SubmitedForms::find($id);
            $sub_form->status = '1';
            $sub_form->save();
            return back()->with('success', 'Form Accept successfully');
        }
        if ($status == 'change_status_pending') {
            $sub_form = SubmitedForms::find($id);
            $sub_form->status = '0';
            $sub_form->save();
            return back()->with('success', 'Form Pending successfully');
        }
        if ($status == 'change_status_reject') {
            $sub_form = SubmitedForms::find($id);
            $sub_form->status = '2';
            $sub_form->save();
            return back()->with('success', 'Form Rejected successfully');
        }

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
            $dataQuery = SubmitedForms::with('category', 'user', 'rejectRequests')
                ->where('status', '2')
                ->orWhere('karigar_status', 1);
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



    public function rejectByKarigarIndex(Request $request, $formId, $status = null, $id = null)
    {

        $dataQuery = KarigarRequestList::where('form_id', $formId)
            ->with('karigar');

        if ($request->has('true')) {
            $perPage = $request->input('pageLimit', 10);
            $searchFilter = $request->input('searchFilter');

            if ($searchFilter !== "") {
                $dataQuery->search($searchFilter);
            }

            $data = $dataQuery->paginate($perPage);
            return response()->json($data);
        }

    

        $page_data['page_title'] = 'All Rejected list';
        return view('admin.rejectKarigarList', compact('page_data'));
    }
}
