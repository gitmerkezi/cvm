<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function __construct()
     {
         $this->middleware('auth')->except('usershow','show');
     }

    public function index()
    {
        $data['jobs'] = \App\Job::orderBy('created_at', 'desc')->paginate(5);
      	return view('admin.pages.jobs.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.pages.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



      $uid= Auth::user()->id;

      \App\Job::create([
          'job_position' => $request['job_position'],
          'job_location' => $request['job_location'],
          'job_details' => $request['job_details'],
          'published' => $request['published'],
          'user_id' => $uid,

      ]);
        return redirect(url('admin/jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('admin.pages.jobs', ['jobs' => Job::findOrFail($id)]);

        //$data['comments'] = \App\Comment::join('jobs', 'job_id', '=', 'comments.job_id')
        //->where([ ['approved', '1'] ,['job_id',$id]])
        //->paginate(2);

        $data['comments'] = \App\Comment::where('job_id', '=', $id)->paginate(2);





        $data['job'] = \App\Job::findOrFail($id);
        return view('jobs.single', $data)->with('id', '$job');
    }

    public function usershow()
    {
        //return view('admin.pages.jobs', ['jobs' => Job::findOrFail($id)]);

        //$data['jobs'] = DB::table('jobs')->where('published', '1')->orderBy('created_at', 'desc')->paginate(6);
        $data['jobs'] = \App\Job::where('published', '1')->orderBy('created_at', 'desc')->paginate(6);
        return view('jobs.index',$data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['job'] = \App\Job::find($id);
      return view ('admin.pages.jobs.edit', $data);
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

      $uid= Auth::user()->id;

      $job = \App\Job::find($id);
      $job->job_position = $request->get('job_position');
      $job->job_location = $request->get('job_location');
      $job->job_details = $request->get('job_details');
      $job->published = $request->get('published');
      $job->user_id = $uid;
      $job->save();

      return redirect(url('admin/jobs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $job = \App\Job::findOrFail($id);
      $job->delete();

      return redirect(url('admin/jobs'));
    }
}
