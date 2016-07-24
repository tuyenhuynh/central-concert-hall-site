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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::all();
        return view('admin.offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offices.create');
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
        $office = new Office;
        $office->name = $input['name'];
        $office->address= $input['address'];
        $office->time_open = $input['time_open'];
        $office->time_close = $input['time_close'];
        $office->latitude = $input['latitude'];
        $office->longtitude = $input['longtitude'];
        $office->is_active = 1;
        $office->save();
        return redirect ('/admin/offices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Method not support";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::find($id);
        return view('admin.offices.edit', compact('office'));
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
        $office = Office::find($id);
        $office->name = $input['name'];
        $office->address= $input['address'];
        $office->time_open = $input['time_open'];
        $office->time_close = $input['time_close'];
        $office->latitude = $input['latitude'];
        $office->longtitude = $input['longtitude'];
        $office->save();
        return redirect ('/admin/offices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Office::destroy($id);
        return redirect('/admin/offices');
    }

    /*--------------------------------------------*/
    
}
