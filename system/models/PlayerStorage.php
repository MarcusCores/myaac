<?php

namespace MyAac\Models;
use Illuminate\Database\Eloquent\Model;

class PlayerStorage extends Model {

	protected $table = 'player_storage';

	public function player()
	{
		return $this->belongsTo(Player::class);
	}
}
