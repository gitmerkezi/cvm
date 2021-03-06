<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'sender_name', 'sender_email', 'comment', 'approved', 'job_id','ip_address',
    ];

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

}
