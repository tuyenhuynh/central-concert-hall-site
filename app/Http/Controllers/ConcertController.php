<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Concert;

use DateTime;

class ConcertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function concert($id) {
        $concert = Concert::find($id);
        return view('admin.concerts.show', compact('concert'));
    }

    public function concerts(){
        $concerts = Concert::all();
        return view("admin.concerts.index", compact('concerts'));
    }

    public function getCreateConcert() {
        return view("admin.concerts.create");
    }

    public function deleteConcert($id) {
        Concert::destroy($id);
        return redirect ("/admin/concerts");
    }

    public function postCreateConcert(Request $request) {
        $input = $request->all();
        $photo_file = $request->file('photo');
        $audio_file = $request->file('audio');

        if($photo_file) {
            $name = time(). $photo_file ->getClientOriginalName();
            $photo_file->move("images", $name);
            $photo_path= "/images/".$name;
            $input['photo_path'] = $photo_path;
        }

        if($audio_file) {
            $name = time(). $audio_file ->getClientOriginalName();
            $audio_file->move("audio", $name);
            $audio_path= "/audio/".$name;
            $input['audio_path'] = $audio_path;
        }

        $datetime = DateTime::createFromFormat('d.m.Y H:i', $input['datetime']);

        $input['date_time'] = $datetime;

        $concert =  Concert::create($input);

        return redirect("/admin/concerts/".$concert->id);
    }

    public function editConcert($id) {
        $concert = Concert::find($id);
        return view("/admin.concerts.edit", compact('concert'));
    }

    public function updateConcert(Request $request) {

        $input = $request->all();

        $photo_file = $request->file('photo');
        $audio_file = $request->file('audio');
        $id = $input['id'];
        $concert = Concert::find($id);
        $concert->name = $input['name'];
        $concert->description = $input['description'];
        $concert->audience_count  = $input['audience_count'];
        $concert->purchase_code = $input['purchase_code'];
        $datetime = DateTime::createFromFormat('d.m.Y H:i', $input['datetime']);
        $concert['date_time'] = $datetime;

        if($photo_file) {
            $name = time(). $photo_file ->getClientOriginalName();
            $photo_file->move("images", $name);
            $photo_path= "/images/".$name;
            $concert->photo_path = $photo_path;
        }

        if($audio_file) {
            $name = time(). $audio_file ->getClientOriginalName();
            $audio_file->move("audio", $name);
            $audio_path= "/audio/".$name;
            $concert->audio_path = $audio_path;
        }

        $concert->save();

        return redirect("/admin/concerts/".$concert->id);

    }

}
