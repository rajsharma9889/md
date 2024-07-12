<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userIndex(Request $request, $status = null, $id = null)
    {
        if ($status == 'change_status') {
            $user = User::find($id);
            $user->status = !$user->status;
            $user->save();
            return back()->with('success', 'User Updated successfully.');
        }
        $dataQuery = User::query();
        if ($request->has('true')) {
            $perPage = $request->input('pageLimit', 10);
            $searchFilter = $request->input('searchFilter');

            if ($searchFilter !== "") {
                $dataQuery->search($searchFilter);
            }

            $data = $dataQuery->paginate($perPage);
            return response()->json($data);
        }
        $page_data['page_title'] = 'All User';
        return view('admin.user', compact('page_data'));
    }
}
