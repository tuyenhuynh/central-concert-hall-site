<?php

namespace App\Http\Controllers;

use DateTime;

use App\Office;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Feedback;

use  App\Concert;

class ConcertHallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
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

    public function concert($id) {
        $concert = Concert::find($id);
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

    public function saveFeedback(Request $request){
        $feedback = array('username' => $request->input('firstname')." ".$request->input('lastname'),
                            'email'=> $request->input('email'),
                            'content' =>$request->input('message'));
        Feedback::create($feedback);
        return redirect('/index');
    }


    public function offices(){
        $offices = Office::all() ;
        return view('offices', compact('offices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
