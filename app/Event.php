<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // for mass assignment
	protected $fillable = ['title', 'description', 'date_occurred'];

	public function profiles()
	{
		return $this->belongsToMany('App\Profile');
	}
	
}