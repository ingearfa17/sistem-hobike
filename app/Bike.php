<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
    	'kode_sepeda', 'jenis_sepeda', 'merek_sepeda', 'image'
    ];

    public function hotels()
    {
    	return $this->belongsToMany('App\Hotel');
    }
}
