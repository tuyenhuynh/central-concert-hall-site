<?php

namespace App\Http\Controllers;

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
    public function ajaxGetConcertByDate( Request $request) {
        if($request->ajax()) {
            $rawDate = $request->input('date');
            $date  = DateTime::createFromFormat('D M d Y', $rawDate);
            $concerts = Concert::where('date_time', 'like', $date->format('Y-m-d')."%")->get();
            return $concerts;
        }else {
            return "failed";
        }
    }

    public function index(){
        $concerts = Concert::all();
        return view('index', compact('concerts'));
    }


    public function posters(){
        $concerts = Concert::all();
        return view('posters', compact('concerts'));
    }

    public function poster($concert_name, $date_time) {
        $concert = null;
        return view('concert', compact('concert'));
    }

    public function hall(){
        return view('hall');
    }

    public function contact() {
        $about_text = file_get_contents('about.txt');

        $file = fopen("about.txt", "r");
        $about_text  = array();
        while(!feof($file)){
            $line = fgets($file);
            $about_text[] = $line;
        }
        fclose($file);

        return view('contact', compact('about_text'));
    }

    public function offices(){
        $offices = Office::all() ;
        return view('offices', compact('offices'));
    }

    public function saveFeedback(Request $request){
        $feedback = array('username' => $request->input('firstname')." ".$request->input('lastname'),
                            'email'=> $request->input('email'),
                            'content' =>$request->input('message'));
        Feedback::create($feedback);
        return redirect('/index');
    }

}
