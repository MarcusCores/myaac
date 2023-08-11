<?php

namespace MyAac\Models;
use Illuminate\Database\Eloquent\Model;

class Player extends Model {

	protected $table = 'players';

	public function player()
	{
		return $this->belongsTo(Player::class);
	}
}
