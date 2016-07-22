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


    private $days = Array('Mon'=>'Понидельник', 'Tue'=>'Вторник', 'Wed'=>'Среду', 'Thu'=>'Пятницу', 'Fri'=>'Четверг', 'Sat'=>'Субботу', 'Sun'=>'Воскресенье');

    private $months = Array('01'=>'янавря',
                            '02'=>'февраля',
                            '03'=>'марта',
                            '04'=>'апреля',
                            '05'=>'мая',
                            '06'=>'июня',
                            '07'=>'июля',
                            '08'=>'августа',
                            '09'=>'сентября',
                            '10'=>'октября',
                            '11'=>'ноября',
                            '12'=>'декабря',
                            );

    private $monthsUppercase = Array('01'=>'ЯНВАРЯ',
        '02'=>'ФЕВРАЛЯ',
        '03'=>'МАРТА',
        '04'=>'АПРЕЛЯ',
        '05'=>'МАЯ',
        '06'=>'ИЮНЯ',
        '07'=>'ИЮЛЯ',
        '08'=>'АВГУТСА',
        '09'=>'СЕНТЯБРЯ',
        '10'=>'ОКТЯБРЯ',
        '11'=>'НОЯБРЯ',
        '12'=>'ДЕКАБРЯ',
    );

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
        foreach($concerts as $concert){
            $date_time = DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time);
            $concert['displayed_date_time'] = $this->formatDateTime($date_time);
        }
        return view('index', compact(['concerts', 'information']));
    }

    private function formatDateTime($date_time) {
        $result = $date_time->format('d '). $this->months[$date_time->format('m')] .$date_time->format(' h:i');
        return $result;
    }

    private function convertDateOfWeekToRussian($date_time) {
        return $this->days[$date_time->format('D')];
    }



    public function posters(){
        $concerts = Concert::all();
        $information = Information::find(1);
        foreach($concerts as $concert) {
            $date_time = DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time);
            $concert['month'] = $this->monthsUppercase[$date_time->format('m')];
            $concert['day_of_week'] = $this->days[$date_time->format('D')];
        }
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
