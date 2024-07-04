<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\TermAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtherDetailsController extends Controller
{
    public function termsIndex(Request $request)
    {

        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
            $TandCiD = $request->input('submit');
            if ($TandCiD) {
                $TandCiD = TermAndCondition::find($TandCiD);

                $TandCiD->description = $request->input('description');
                $TandCiD->save();
            } else {
                $TandCiD = new TermAndCondition;
                $TandCiD->description = $request->input('description');
                $TandCiD->save();
            }

            return back()->with('success', 'Terms and  Condition Updated successfully.');
        }
        $page_data['page_title'] = 'Term and  Condition';
        $page_data['get_table'] = TermAndCondition::all();
        return view('terms_condition', compact('page_data'));
    }
    public function aboutUsIndex(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
            $aboutUsId = $request->input('submit');
            if ($aboutUsId) {
                $aboutus = AboutUs::find($aboutUsId);
                $aboutus->description = $request->input('description');
                $aboutus->save();
            } else {
                $aboutus = new AboutUs;
                $aboutus->description = $request->input('description');
                $aboutus->save();
            }
            return back()->with('success', 'About Us Updated successfully.');

        }

        $page_data['page_title'] = 'About US';
        $page_data['get_table'] = AboutUs::all();
        return view('about_us', compact('page_data'));

    }
}