<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

  protected $primaryKey = 'job_id';  //find fonksiyonu icin

  public function comment()
  {
    return $this->hasMany('App\Comment');
  }

  protected $fillable = [
      'job_position', 'job_location', 'job_details', 'user_id', 'published',
  ];

}
