<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
	protected $fillable = ['name', 'user_id', 'preview', 'ingredients', 'img', 'body'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
