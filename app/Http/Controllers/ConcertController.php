<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Concert;

class ConcertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function concert($id) {
        $concert = Concert::find($id);
        return view('concert', compact('concert'));
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

}
