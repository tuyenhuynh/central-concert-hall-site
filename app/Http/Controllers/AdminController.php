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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all() ;
        return view("admin.index", compact('users'));
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


}
