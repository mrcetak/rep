<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jenis;
use App\Ruang;
use App\User;

class Inventaris extends Model
{
    //
	public function jenis()
	{
		return $this->belongsTo('App\Jenis');
	}

	public function ruang()
	{
		return $this->belongsTo('App\Ruang');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
