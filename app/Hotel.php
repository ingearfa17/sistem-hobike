<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
    	'id', 'nama', 'alamat', 'kodepos', 'lintang', 'bujur'
    ];

    public function bikes()
    {
    	return $this->belongsToMany('App\Bike');
    }

    public function member()
	{
		return $this->belongsTo('App\Members');
	}
    public function sewaAwal()
    {
        return $this->hasMany('App\Sewa', 'id');
    }

    public function sewaKembali()
    {
        return $this->hasMany('App\Sewa', 'id');
    }
}
