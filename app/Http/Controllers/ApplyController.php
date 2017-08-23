<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use \App\Job;
use \App\Apply;
use \App\Http\Requests\ApplyRequest;


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
//leftJoin('jobs', 'jobs.job_id', '=', 'applies.job_id')

      $data['applies'] = Apply::leftJoin('jobs', 'jobs.job_id', '=', 'applies.job_id')
      ->join('users', function ($join) {
          $join->on('users.id', '=', 'applies.user_id')
               ->select('users.name', 'users.email', 'users.id');
      })
      ->orderBy('applies.created_at', 'desc')
      ->paginate(6);

      return view ('admin.pages.apply.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
          $data['job'] = Job::findOrFail($id);
          return view ('apply.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplyRequest $request,$id)
    {
      $uid = Auth::user()->id;

      if ($request->hasFile('pdf')) {
          $file     = Input::file('pdf');
          $fileName = $this->clearFileName($file);
          $file->move('pdf/cvs', $fileName);
      }

      Apply::create([
          'user_id' => $uid,
          'job_id' => $id,
          'gender' => $request['gender'],
          'bday' => $request['bday'],
          'phone' => $request['phone'],
          'resume' => $request['resume'],
          'pdf' => isset($fileName) ? 'pdf/cvs/' . $fileName : null,
      ]);

    $fileName =  $id . '.' . $request->file('image')->getClientOriginalExtension();

    $request->file('file')->move(
            base_path() . '/public/pdfs/', $fileName);

        return redirect(url('jobs/'))->with('message', 'Application was submitted successfully!');
        return Redirect::back()->withErrors(['msg', 'The Message']);
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
