<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_User extends Model
{
	protected $primaryKey = null;
    protected $fillable = ['site_id', 'user_id'];
	public $timestamps = false;
}
