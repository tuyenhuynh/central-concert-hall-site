<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Office;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Concert;

use App\User;

use DateTime;

use App\Information;

class AdminController extends Controller
{

    protected $about_text;

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $information = Information::firstOrFail();
        $offices = Office::all(['name', 'id']);
        return view("admin.index", compact(['information', 'offices']));
    }


    public function ajaxUpdatePhoneNumber(Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            $information->phone_number = $request->phone_number;
            $information->save();

            return 'ok';
        }else {
            return 'failed';
        }

    }

    public function ajaxUpdateDefaultPurchaseCode (Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            $information->default_purchase_code = $request->default_purchase_code;
            $information->save();

            return 'ok';
        }else {
            return 'failed';
        }
    }

    public function ajaxUpdateCompanyInfo (Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            $information->company_info = $request->company_info;
            $information->save();

            return 'Information updated';
        }else {
            return 'failed';
        }
    }

    public function updateHallSchema (Request $request) {

        $information = Information::firstOrFail();
        $svg_file  = $request->file('hall_schema');
        if($svg_file) {
            $name = time().$svg_file ->getClientOriginalName();
            $svg_file->move("images", $name);
            $svg_path= "/images/".$name;
            $information->hall_schema = $svg_path;
            $information->save();
        }
        return redirect('/admin/#form-hall-schema');

    }

    public function ajaxUpdateHallSchema (Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            if($request->hasFile('schema')) {
                return 'ok';
            }
            return  'failed';

            $information->hall_schema = $request->hall_schema;
            $information->save();

            return 'ok';
        }else {
            return 'failed';
        }
    }

    public function ajaxUpdateHallText (Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            $information->hall_text = $request->hall_text;
            $information->save();

            return 'ok';
        }else {
            return 'failed';
        }
    }

    public function ajaxUpdateCeoText (Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            $information->ceo_text = $request->ceo_text;
            $information->save();

            return 'ok';
        }else {
            return 'failed';
        }
    }

    public function ajaxUpdateOfficeLocation (Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            $information->office_location = $request->office_location;
            $information->save();

            return 'ok';
        }else {
            return 'failed';
        }
    }

    public function ajaxUpdateSocialNetworkLinks(Request $request) {
        if($request->ajax()) {
            $information = Information::firstOrFail();
            $information->facebook_url = $request->facebook_url;
            $information->vk_url = $request->vk_url;
            $information->twitter_url = $request->twitter_url;
            $information->instagram_url = $request->instagram_url;
            $information->save();
            return 'ok';
        }else  {
            return 'failed';
        }
    }

}
