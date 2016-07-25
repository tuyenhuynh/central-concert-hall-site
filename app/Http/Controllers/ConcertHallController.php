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


    private $days = Array('Mon'=>'Понидельник',
                            'Tue'=>'Вторник',
                            'Wed'=>'Среду',
                            'Thu'=>'Пятницу',
                            'Fri'=>'Четверг',
                            'Sat'=>'Субботу',
                            'Sun'=>'Воскресенье');

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

    public function ajaxGetConcertsByDate( Request $request) {
        if($request->ajax()) {
            $rawDate = $request->input('date');
            $date  = DateTime::createFromFormat('D M d Y', $rawDate);
            $concerts = Concert::where('date_time', 'like', $date->format('Y-m-d')."%")->get();
            foreach ($concerts as $concert){
                $this->editConcertForView($concert);
            }
            return $concerts;
        }else {
            return "failed";
        }
    }

    public function index(){
        $concerts = Concert::all();
        $information = Information::firstOrFail();
        foreach ($concerts as $concert){
            $this->editConcertForView($concert);
        }
        return view('index', compact(['concerts', 'information']));
    }

    private function editConcertForView($concert) {
        $date_time = DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time);
        $concert['displayed_date_time'] = $date_time->format('d ')
            . $this->months[$date_time->format('m')]
            .","
            .$date_time->format(' h:i');
        $concert->link = "/afisha/". $concert->name ."/" .$date_time->format('dmY');

    }

    public function posters(){
        $concerts = Concert::all();
        $information = Information::firstOrFail();

        foreach($concerts as $concert) {
            $date_time_object = DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time);
            $concert->date_time_object = $date_time_object;
            $concert['month'] = $this->months[$date_time_object->format('m')];
            $concert['day_of_week'] = $this->days[$date_time_object->format('D')];
        }



        $count = count($concerts);
        $check = array();
        for($i = 0 ; $i < $count; ++$i) {
            $check[$i] = 0;
        }

        $result = array();

        $c = 0 ;
        for($i =0 ; $i < $count ; ++$i) {
            if(!$check[$i]) {
                $check[$i] = 1;
                $result[$c] = array();
                $result[$c][] = $concerts[$i];
                for($j = $i +1 ; $j < $count ; ++$j) {
                    if( !$check[$j] &&
                        $this->sameMonthAndYear($concerts[$j]->date_time_object, $concerts[$i]->date_time_object )){
                        $check[$j] = 1;
                        $result[$c][] =$concerts[$j];
                    }
                }
                ++$c;
            }
        }
        return view('posters', compact(['result', 'information']));
    }

    private function sameMonthAndYear($date_time1 , $date_time2) {
        return $date_time1->format('m') == $date_time2->format('m')
                && $date_time1->format('Y') == $date_time2->format('Y');
    }

    public function concert($concert_name, $date_time) {
        $concert_date_time = DateTime::createFromFormat('dmY', $date_time)->format('Y-m-d');
        $concert = Concert::where('name', $concert_name)
                        ->where('date_time', 'like', $concert_date_time."%")->first();
        $information = Information::firstOrFail();
        $this->editConcertForView($concert);







        return view('concert', compact(['concert', 'information']));
    }

    public function hall(){
        $information = Information::firstOrFail();
        return view('hall', compact('information'));
    }

    public function contact() {

        $information = Information::firstOrFail();
        return view('contact', compact('information'));
    }

    public function offices(){
        $offices = Office::all();
        $information = Information::firstOrFail();
        $selected_office = Office::where('name', $information->office_location)->first(['latitude', 'longtitude', 'name']);
        return view('offices', compact(['offices', 'information', 'selected_office']));
    }

    public function saveFeedback(Request $request){
        
        if($request->ajax()) {
            $feedback = array('username' => $request->input('username'),
                'email'=> $request->input('email'),
                'content' =>$request->input('message'));
            Feedback::create($feedback);
            return "ok";
        }
        return "failed";
    }

}
