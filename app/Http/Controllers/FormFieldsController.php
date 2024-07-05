<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Dandi;
use App\Models\GazeSize;
use App\Models\Gender;
use App\Models\Kunda;
use App\Models\Latkan;
use App\Models\Purity;
use App\Models\Size;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormFieldsController extends Controller
{
    public function genderIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Gender::query();
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
            $gender = Gender::find($id);
            $gender->status = !$gender->status;
            $gender->save();
            return back()->with('success', 'Gender Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'gender' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $gender = new Gender;
            $gender->gender = $request->gender;
            $gender->save();
            return back()->with('success', 'Gender added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'gender' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $gender = Gender::find($request->id);
            $gender->gender = $request->gender;
            $gender->save();
            return back()->with('success', 'Gender Updated successfully.');
        }
        $page_data['page_title'] = "Gender";
        return view('form_fields.gender', compact('page_data'));
    }
    public function purityIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Purity::query();
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
            $purity = Purity::find($id);
            $purity->status = !$purity->status;
            $purity->save();
            return back()->with('success', 'Purity Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'purity' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $purity = new Purity;
            $purity->purity = $request->purity;
            $purity->save();
            return back()->with('success', 'Purity added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'purity' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $purity = Purity::find($request->id);
            $purity->purity = $request->purity;
            $purity->save();
            return back()->with('success', 'Purity Updated successfully.');
        }
        $page_data['page_title'] = "Purity";
        return view('form_fields.purity', compact('page_data'));
    }
    public function colorIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Color::query();
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
            $color = Color::find($id);
            $color->status = !$color->status;
            $color->save();
            return back()->with('success', 'Color Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'color' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $color = new Color;
            $color->color = $request->color;
            $color->save();
            return back()->with('success', 'Color added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'color' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $color = Color::find($request->id);
            $color->color = $request->color;
            $color->save();
            return back()->with('success', 'Color Updated successfully.');
        }
        $page_data['page_title'] = "Color";
        return view('form_fields.color', compact('page_data'));
    }
    public function dandiIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Dandi::query();
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
            $dandi = Dandi::find($id);
            $dandi->status = !$dandi->status;
            $dandi->save();
            return back()->with('success', 'Dandi Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'dandi' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $dandi = new Dandi;
            $dandi->dandi = $request->dandi;
            $dandi->save();
            return back()->with('success', 'Dandi added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'dandi' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $dandi = Dandi::find($request->id);
            $dandi->dandi = $request->dandi;
            $dandi->save();
            return back()->with('success', 'Dandi Updated successfully.');
        }
        $page_data['page_title'] = "Dandi";
        return view('form_fields.dandi', compact('page_data'));
    }
    public function gaze_sizeIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = GazeSize::query();
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
            $gaze_size = GazeSize::find($id);
            $gaze_size->status = !$gaze_size->status;
            $gaze_size->save();
            return back()->with('success', 'Gase Size Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'gaze_size' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $gaze_size = new GazeSize;
            $gaze_size->gaze_size = $request->gaze_size;
            $gaze_size->save();
            return back()->with('success', 'Gaze Size added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'gaze_size' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $gaze_size = GazeSize::find($request->id);
            $gaze_size->gaze_size = $request->gaze_size;
            $gaze_size->save();
            return back()->with('success', 'Gaze Size Updated successfully.');
        }
        $page_data['page_title'] = "Gaze Size";
        return view('form_fields.gaze_size', compact('page_data'));
    }
    public function kundaIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Kunda::query();
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
            $kunda = Kunda::find($id);
            $kunda->status = !$kunda->status;
            $kunda->save();
            return back()->with('success', 'Kunda Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'kunda' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $kunda = new kunda;
            $kunda->kunda = $request->kunda;
            $kunda->save();
            return back()->with('success', 'Kunda added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'kunda' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $kunda = Kunda::find($request->id);
            $kunda->kunda = $request->kunda;
            $kunda->save();
            return back()->with('success', 'kunda Updated successfully.');
        }
        $page_data['page_title'] = "Kunda";
        return view('form_fields.kunda', compact('page_data'));
    }
    public function latkanIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Latkan::query();
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
            $latkan = Latkan::find($id);
            $latkan->status = !$latkan->status;
            $latkan->save();
            return back()->with('success', 'Latkan Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'latkan' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $latkan = new Latkan;
            $latkan->latkan = $request->latkan;
            $latkan->save();
            return back()->with('success', 'Latkan added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'latkan' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $latkan = Latkan::find($request->id);
            $latkan->latkan = $request->latkan;
            $latkan->save();
            return back()->with('success', 'Latkan Updated successfully.');
        }
        $page_data['page_title'] = "Latkan";
        return view('form_fields.latkan', compact('page_data'));
    }
    public function sizeIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Size::query();
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
            $size = Size::find($id);
            $size->status = !$size->status;
            $size->save();
            return back()->with('success', 'Size Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'size' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $size = new Size;
            $size->size = $request->size;
            $size->save();
            return back()->with('success', 'Size added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'size' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $size = Size::find($request->id);
            $size->size = $request->size;
            $size->save();
            return back()->with('success', 'Size Updated successfully.');
        }
        $page_data['page_title'] = "Size";
        return view('form_fields.size', compact('page_data'));
    }
    public function weightIndex(Request $request, $status = null, $id = null)
    {
        $dataQuery = Weight::query();
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
            $weight = Weight::find($id);
            $weight->status = !$weight->status;
            $weight->save();
            return back()->with('success', 'Weight Updated successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'weight' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $weight = new Weight;
            $weight->weight = $request->weight;
            $weight->save();
            return back()->with('success', 'Weight added successfully.');
        }
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), [
                'weight' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }

            $weight = Weight::find($request->id);
            $weight->weight = $request->weight;
            $weight->save();
            return back()->with('success', 'Weight Updated successfully.');
        }
        $page_data['page_title'] = "Weight";
        return view('form_fields.weight', compact('page_data'));
    }
}
