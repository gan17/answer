<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $table = 'answers';
  public $incrementing = false;
  protected $primaryKey = 'id';
  protected $fillable = array('fullname','gender','age_id','email','is_send_email','feedback');
}
