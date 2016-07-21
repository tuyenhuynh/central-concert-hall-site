<?php

namespace App\Http\Controllers;

use App\Information;
use DateTime;

use App\Office;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Feedback;

use  App\Concert;

use Input;

use Log;

use App\Photo;

class ConcertHallController extends Controller
{
    public function ajaxGetConcertsByDate( Request $request) {
        if($request->ajax()) {
            $rawDate = $request->input('date');
            $date  = DateTime::createFromFormat('D M d Y', $rawDate);
            $concerts = Concert::where('date_time', 'like', $date->format('Y-m-d')."%")->get();
            foreach ($concerts as $concert) {
                $concert['link'] = "/afisha/" . $concert->name ."/". $date->format('dmY');
                $concert['datetime'] = DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('d/m/Y, H:i');
            }

            return $concerts;
        }else {
            return "failed";
        }
    }

    public function index(){
        $concerts = Concert::all();
        $information = Information::find(1);
        return view('index', compact(['concerts', 'information']));
    }

    public function posters(){
        $concerts = Concert::all();
        $information = Information::find(1);
        return view('posters', compact(['concerts', 'information']));
    }

    public function poster($concert_name, $date_time) {
        $concert_date_time = DateTime::createFromFormat('dmY', $date_time)->format('Y-m-d');
        $concert = Concert::where('name', $concert_name)
                        ->where('date_time', 'like', $concert_date_time."%")->first();

        $information = Information::find(1);
        return view('concert', compact(['concert', 'information']));
    }

    public function hall(){
        $information = Information::find(1);
        return view('hall', compact('information'));
    }

    public function contact() {

        $information = Information::find(1);
        return view('contact', compact('information'));
    }

    public function offices(){
        $offices = Office::all();
        $information = Information::find(1);
        return view('offices', compact(['offices', 'information']));
    }

    public function saveFeedback(Request $request){
        $feedback = array('username' => $request->input('firstname')." ".$request->input('lastname'),
                            'email'=> $request->input('email'),
                            'content' =>$request->input('message'));
        Feedback::create($feedback);
        return redirect('/index');
    }

}
