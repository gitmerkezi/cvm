<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Job;
use \App\User;
use Hash;
use DB;
use \App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

     public function dashboard()
     {
         $announce = Job::count();
         $tusers = User::count();
       return view ('admin.pages.dashboard',compact('announce', 'tusers'));

     }

    public function index()
    {
        $data['users'] = User::paginate(5);
        return view ('admin.pages.users.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view ('admin.pages.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

      User::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => bcrypt($request['password']),
      ]);

        return redirect(url('admin/users'));
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
      $data['user'] = User::find($id);

      // admine öncelik
      if ($id==1) {
        return back()->withErrors(['id' => ['First admin cannot edit from panel !']]);
      }

      return view ('admin.pages.users.edit', $data);
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
      $user = User::find($id);
      $user->email = $request->get('email');
      $user->name = $request->get('name');

      if ($request->get('password') != '') {
      $user->password = hash::make($request->get('password'));
    }
      $user->save();

      return redirect(url('admin/users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);

      // admine öncelik
      if ($id==1) {
        return back()->withErrors(['id' => ['First admin cannot delete from panel !']]);
      }

      $user->delete();

      return redirect(url('admin/users'));
    }
}
