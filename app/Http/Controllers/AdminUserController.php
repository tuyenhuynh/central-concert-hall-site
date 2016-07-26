<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
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

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->password = bcrypt($request->password);

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_active' => $request->is_active,
            'role_id' => $request->role_id,
        ]);

        return $this->show($user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user){
            return view('admin.users.show', compact('user'));
        }
        return redirect("admin/users");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if($user){
            return view('admin.users.edit', compact('user'));
        }
        return redirect("admin/users");
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
        $user = User::findOrFail($id);
        if($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_active = $request->is_active;
            $user->role_id = $request->role_id;
            $user->save();
        }
        return redirect('/admin/users');
    }

    public function deactivateUser($id) {
        $user = User::findOrFail($id);
        if($user) {
            $user->is_active = User::$NON_ACTIVE;
            $user->save();
        }
        return redirect('/admin/users/');
    }

    public function activateUser($id)  {
        $user = User::findOrFail($id);
        if($user) {
            $user->is_active =User::$ACTIVE;
            $user->save();
        }
        return redirect('/admin/users/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/users/index');
    }

}
