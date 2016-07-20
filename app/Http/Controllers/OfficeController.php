<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Office;

use DateTime;

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

    public function getCreateOffice(){
        return view('admin.offices.create');
    }

    public function postCreateOffice(Request $request) {
        $input = $request->all();
        $office = new Office;
        $office->name = $input['name'];
        $office->address= $input['address'];
        $office->time_open = $input['time_open']; //DateTime::createFromFormat('', $input['time_open']);
        $office->time_close = $input['time_close']; //DateTime::createFromFormat('', $input['time_close']);
        $office->save();
        return redirect ('/admin/offices');
    }

    public function getUpdateOffice($id) {
        $office = Office::find($id);
        return view('admin.offices.edit', compact('office'));
    }

    public function postUpdateOffice(Request $request) {
        $input = $request->all();
        $office = Office::find($input['id']);
        $office->name = $input['name'];
        $office->address= $input['address'];
        $office->time_open = $input['time_open'];
        $office->time_close = $input['time_close'];
        $office->save();
        return redirect ('/admin/offices');
    }

    public function deleteOffice($id) {
        Office::destroy($id);
        return redirect('/admin/offices');
    }


}
