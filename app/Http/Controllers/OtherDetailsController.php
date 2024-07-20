<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\HomeBanner;
use App\Models\PrivecyPolicy;
use App\Models\TermAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function privacyIndex(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
            $privecyPolicyId = $request->input('submit');
            if ($privecyPolicyId) {

                $privecyPolicyId = PrivecyPolicy::find($privecyPolicyId);
                $privecyPolicyId->description = $request->input('description');
                $privecyPolicyId->save();
            } else {
                $privecyPolicyId = new PrivecyPolicy;
                $privecyPolicyId->description = $request->input('description');
                $privecyPolicyId->save();
            }
            return back()->with('success', 'Privecy Policy Updated successfully.');

        }

        $page_data['page_title'] = 'Privecy Policy';
        $page_data['get_table'] = PrivecyPolicy::all();
        return view('privacy_policy', compact('page_data'));

    }
    public function homeBannerIndex(Request $request, $status = null, $id = null)
    {
        if ($status == 'delete') {
            $banner = HomeBanner::find($id);
            if (File::exists($banner->image)) {
                File::delete($banner->image);
            }
            $banner->delete();
            return back()->with('success', 'Banner delete successfully.');
        }
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
                'image' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
            $path = $request->image->store('media', 'public');

            $banner = new HomeBanner;
            $banner->title = $request->title;
            $banner->image = 'public/storage/' . $path;
            $banner->save();
            return back()->with('success', 'Home Banner added successfully.');
        }

        $dataQuery = HomeBanner::query();
        if ($request->has('true')) {
            $perPage = $request->input('pageLimit', 10);
            $searchFilter = $request->input('searchFilter');

            if ($searchFilter !== "") {
                $dataQuery->search($searchFilter);
            }
            $data = $dataQuery->paginate($perPage);

            return response()->json($data);
        }
        $page_data['page_title'] = 'Home Banner';
        return view('home_banner', compact('page_data'));

    }
}