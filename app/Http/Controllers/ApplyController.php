<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Job;
use Session;
use Auth;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth')->only('index','create');
    }

    public function index()
    {
      $data['applies'] = \App\Apply::orderBy('created_at', 'desc')->paginate(5);
      return view ('admin.pages.apply.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
          $data['job'] = \App\Job::findOrFail($id);
          return view ('apply.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $uid = Auth::user()->id;

      $this->validate(request(),[
        'gender' => 'required',
        'bday' => 'required',
        'phone' => 'required|min:10|max:14',
      ]);

      \App\Apply::create([
          'user_id' => $uid,
          'job_id' => $id,
          'gender' => $request['gender'],
          'bday' => $request['bday'],
          'phone' => $request['phone'],
          'resume' => $request['resume'],
      ]);

        return redirect(url('jobs/'))->with('message', 'Application was submitted successfully!');
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
