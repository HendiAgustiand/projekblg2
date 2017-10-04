<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';
	protected $fillable= array('id','title','desc','image');
    protected $guarded = ['id'];
      
}
