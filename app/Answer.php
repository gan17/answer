<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $table = 'answers';
  public $incrementing = false;
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $fillable = array('fullname','gender','age_id','email','is_send_email','feedback','created_at','updated_at','deleted_at');
}
