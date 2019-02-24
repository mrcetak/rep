<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peminjaman;
use App\Pegawai;

class Pengembalian extends Model
{
    //
    public function peminjaman()
	{
		return $this->belongsTo('App\Peminjaman');
	}

	public function Pegawai()
	{
		return $this->belongsTo('App\Pegawai');
	}
}
