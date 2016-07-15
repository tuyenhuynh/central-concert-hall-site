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

class AdminController extends Controller
{

    protected $about_text;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all() ;
        return view("admin.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function concerts(){
        $concerts = Concert::all();
        return view("admin.concerts.index", compact('concerts'));
    }

    public function getCreateConcert() {
        return view("admin.concerts.create");
    }

    public function postCreateConcert(Request $request) {
        $input = $request->all();
        $photo_file = $request->file('photo');
        $thumb_photo_file = $request->file('thumb_photo');
        if($photo_file) {
            $name = time(). $photo_file ->getClientOriginalName();
            $photo_file->move("images", $name);
            $photo = Photo::create(['path' =>"/images/".$name]);
            $input['photo_id'] = $photo->id;
        }

        if($thumb_photo_file) {
            $name = time(). $thumb_photo_file ->getClientOriginalName();
            $thumb_photo_file->move("images", $name);
            $thumb_photo = Photo::create(['path' =>"/images/".$name]);
            $input['thumb_photo_id'] = $thumb_photo->id;
        }

        $datetime = DateTime::createFromFormat('d.m.Y H:i', $input['datetime']);

        $input['date_time'] = $datetime;

        $concert = Concert::create($input);

        return redirect("/admin/concerts");
    }

    public function editConcert($id) {
        $concert = Concert::find($id);
        return view("/admin/concerts/edit", compact('concert'));
    }

    public function updateConcert(Request $request) {
        return "concert updated";
    }

    public function feedbacks() {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function feedback($id) {
        $feedback = null;
        return view('admin.feedback', compact('feedback'));
    }

    public function offices() {
        $offices = Office::all();
        return view('admin.offices.index', compact('offices'));
    }

    public function office($id) {
        $office = null;
        return view('admin.office', compact('office'));
    }

    public function createOffice(Request $request) {

    }

    public function updateOffice(Request $request) {

    }

    public function about() {
        $about_text = file_get_contents('about.txt');
        return view('admin.about', compact('about_text'));
    }


    public function updateAboutText(Request $request) {
        $about_text = $request->input('text');
        $file = fopen('about.txt', 'w');
        fwrite($file, $about_text);
        fclose($file);
        return redirect('/admin/about');
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
