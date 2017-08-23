<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{

  protected $primaryKey = 'apply_id';  //find fonksiyonu icin

  protected $fillable = [
      'user_id', 'job_id', 'gender', 'bday', 'phone', 'resume',
  ];


}
