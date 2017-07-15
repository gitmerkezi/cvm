<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use \App\Job;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth', ['except' => ['store', 'anotherMethod']]);
     }

    public function index()
    {
      $data['comments'] = \App\Comment::leftJoin('jobs', 'jobs.job_id', '=', 'comments.job_id')
      ->orderBy('comments.created_at', 'desc')
      ->paginate(5);

      return view ('admin.pages.comments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $this->validate(request(),[
        'name' => 'required',
        'email' => 'required|string|email|max:255',
        'comment' => 'required|min:5|max:2000',
      ]);




      \App\Comment::create([
          'sender_name' => $request['name'],
          'sender_email' => $request['email'],
          'comment' => $request['comment'],
          'approved' => '0', //onaya ihtiyac duymadan yayınla icin 1
          'job_id' => $id,
          'ip_address' => $request->ip(),

      ]);

      session::flash('Success','Comment was added');
      return redirect()->action('JobsController@show', ['id' => $id] );
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
        $data['comment'] = \App\Comment::find($id);
        return view ('admin.pages.comments.edit', $data);
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
    public function destroy($comment_id)
    {
      $comment = \App\Comment::findOrFail($comment->comment_id);
      $comment->delete();

      return redirect(url('admin/comments'));
    }
}
