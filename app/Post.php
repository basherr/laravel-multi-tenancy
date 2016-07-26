<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public $timestamps = false;
    protected $fillable = ['post_title', 'post_content', 'post_type'];
    protected $table = 'posts';
}
