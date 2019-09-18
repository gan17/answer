<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
  protected $table = 'ages';
  public $incrementing = false;
  protected $primaryKey = 'id';
  protected $fillable = array('age','sort');
}
