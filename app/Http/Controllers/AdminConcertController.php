<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Concert;

use DateTime;

class AdminConcertController extends Controller
{
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
        $concerts = Concert::all();
        return view("admin.concerts.index", compact('concerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.concerts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->saveUploadedFiles($request, $input);
        $datetime = DateTime::createFromFormat('d.m.Y H:i', $input['datetime']);
        $input['date_time'] = $datetime;
        $concert =  Concert::create($input);

        return redirect("/admin/concerts/".$concert->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concert = Concert::findOrFail($id);
        return view('admin.concerts.show', compact('concert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concert = Concert::find($id);
        return view("/admin.concerts.edit", compact('concert'));
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
        $input = $request->all();
        $concert = Concert::find($id);
        $concert->name = $input['name'];
        $concert->description = $input['description'];
        $concert->lim_age  = $input['lim_age'];
        $concert->purchase_code = $input['purchase_code'];
        $datetime = DateTime::createFromFormat('d.m.Y H:i', $input['datetime']);
        $concert['date_time'] = $datetime;


        $photo_file = $request->file('photo');
        $audio_file = $request->file('audio');

        if($photo_file) {
            $name = time(). $photo_file ->getClientOriginalName();
            $photo_file->move("images", $name);
            $photo_path= "/images/".$name;
            $concert['photo_path'] = $photo_path;
        }
        if($audio_file) {
            $name = time(). $audio_file ->getClientOriginalName();
            $audio_file->move("audio", $name);
            $audio_path= "/audio/".$name;
            $result['audio_path'] = $audio_path;
        }

        $concert->save();

        return redirect("/admin/concerts/".$concert->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Concert::destroy($id);
        return redirect ("/admin/concerts");
    }

    private function saveUploadedFiles(Request $request) {
        $photo_file = $request->file('photo');
        $audio_file = $request->file('audio');

        $result = array();
        if($photo_file) {
            $name = time(). $photo_file ->getClientOriginalName();
            $photo_file->move("images", $name);
            $photo_path= "/images/".$name;
            $result['photo_path'] = $photo_path;
        }else {
            $result['photo_path'] = "http://placehold.it/350x150";
        }

        if($audio_file) {
            $name = time(). $audio_file ->getClientOriginalName();
            $audio_file->move("audio", $name);
            $audio_path= "/audio/".$name;
            $result['audio_path'] = $audio_path;
        }else {
            $result['audio_path'] = "";
        }

        return $result;
    }

}
