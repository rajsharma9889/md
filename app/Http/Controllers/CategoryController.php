<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function categoryIndex(Request $request, $status = null, $id = null)
    {
        if ($status == 'change_status') {
            $category = Category::find($id);
            $category->status = !$category->status;
            $category->save();
            return back()->with('success', 'Category Updated successfully.');
        }
        $dataQuery = Category::query();
        if ($request->has('true')) {
            $perPage = $request->input('pageLimit', 10);
            $searchFilter = $request->input('searchFilter');

            if ($searchFilter !== "") {
                $dataQuery->search($searchFilter);
            }

            $data = $dataQuery->paginate($perPage);
            return response()->json($data);
        }
        if ($request->isMethod('POST')) {

            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'category' => 'required|string',
                'gender' => 'required|in:0,1,2',
                'purity' => 'required|in:0,1,2',
                'color' => 'required|in:0,1,2',
                'dandi' => 'required|in:0,1,2',
                'kunda' => 'required|in:0,1,2',
                'size' => 'required|in:0,1,2',
                'gaze_size' => 'required|in:0,1,2',
                'weight' => 'required|in:0,1,2',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
            $category = new Category;
            $category->category = $request->category;
            $category->gender = $request->gender;
            $category->purity = $request->purity;
            $category->color = $request->color;
            $category->dandi = $request->dandi;
            $category->kunda = $request->kunda;
            $category->size = $request->size;
            $category->gaze_size = $request->gaze_size;
            $category->weight = $request->weight;
            $category->save();
            return back()->with('success', 'Category added successfully.');

        }


        $page_data['page_title'] = 'All Category';
        return view('category.category_index', compact('page_data'));
    }
    public function add_category_page(Request $request, $id = null)
    {
        if ($id) {
            $page_data['page_title'] = 'Edit category';
            return view('category.add_category', compact('page_data'));
        }
        $page_data['page_title'] = 'Add a category';
        return view('category.add_category', compact('page_data'));
    }
}
