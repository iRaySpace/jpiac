<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // for mass assignment
	protected $fillable = ['fname', 'lname', 'address', 'twitter_page', 'birthday'];

	public function events()
	{
		return $this->belongsToMany('App\Event');
	}
	
}
