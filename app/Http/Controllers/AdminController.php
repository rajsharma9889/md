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
        if ($status == 'complete') {
            $form = SubmitedForms::find($id);
            $form->status = '3';
            $form->save();
            return back()->with('success', 'Mark Completed');
        }
        if ($status == 'reject') {
            // return 
            $form = SubmitedForms::find($request->form_id);
            return $form;
            // $form->status = '4';
            // $form->save();
            // return back()->with('success', 'Mark Rejected');
        }


        if ($status == 'rejected') {
            $dataQuery = SubmitedForms::with('category', 'user')->whereStatus('4');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'Rejected Items';
        }
        if ($status == 'completedlist') {
            $dataQuery = SubmitedForms::with('category', 'user')->whereStatus('3');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'Completed Items';
        }
        if ($status == 'ready') {
            $dataQuery = SubmitedForms::with('category', 'user')->whereStatus('2');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'Ready to Pick';
        }
        if ($status == 'working') {
            $dataQuery = SubmitedForms::with('category', 'user')->whereStatus('1');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'Working Requests';
        }

        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'reason' => 'required|string|',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
            $form = SubmitedForms::find($request->form_id);
            $form->status = '4';
            $karigarList = KarigarRequestList::where('form_id', $request->form_id)->first();

            if ($karigarList) {
                $karigarList->adminreject = 1;
                $karigarList->save();
            }
            $form->reason = $request->reason;
            $form->save();
            return back()->with('success', 'Rejected successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'selected_karigar' => 'required|string|exists:karigars,id',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
            $form = SubmitedForms::find($request->form_id);
            $form->karigar = 1;
            $form->save();
            $req_list = new KarigarRequestList;
            $req_list->karigar_id = $request->selected_karigar;
            $req_list->form_id = $request->form_id;
            $req_list->save();
            return back()->with('success', 'Assiged successfully.');
        }

        if (!$status) {
            $dataQuery = SubmitedForms::with('category', 'user')->where('karigar', 0)->whereStatus('0');
            if ($request->has('true')) {
                $perPage = $request->input('pageLimit', 10);
                $searchFilter = $request->input('searchFilter');

                if ($searchFilter !== "") {
                    $dataQuery->search($searchFilter);
                }

                $data = $dataQuery->paginate($perPage);
                return response()->json($data);
            }
            $page_data['page_title'] = 'New Requests';
        }


        return view('admin.user_new_requests', compact('page_data'));
    }


    public function rejectByKarigarIndex(Request $request, $status = null, $id = null)
    {

        $dataQuery = KarigarRequestList::whereStatus(2)->whereAdminreject(0)->with('karigar', 'form.category');
        if ($request->has('true')) {
            $perPage = $request->input('pageLimit', 10);
            $searchFilter = $request->input('searchFilter');

            if ($searchFilter !== "") {
                $dataQuery->search($searchFilter);
            }

            $data = $dataQuery->paginate($perPage);
            return response()->json($data);
        }

        $page_data['page_title'] = 'Reject By Karigars';
        return view('admin.rejectKarigarList', compact('page_data'));
    }
    public function assignedKarigarIndex(Request $request, $status = null, $id = null)
    {

        $dataQuery = KarigarRequestList::whereStatus(0)->where('adminreject', 0)->with('karigar', 'form.category');

        if ($request->has('true')) {
            $perPage = $request->input('pageLimit', 10);
            $searchFilter = $request->input('searchFilter');

            if ($searchFilter !== "") {
                $dataQuery->search($searchFilter);
            }

            $data = $dataQuery->paginate($perPage);
            return response()->json($data);
        }
        $page_data['page_title'] = 'Assinged Karigars';
        return view('admin.rejectKarigarList', compact('page_data'));
    }
}
