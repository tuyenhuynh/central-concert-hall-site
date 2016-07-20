<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Office;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

}
