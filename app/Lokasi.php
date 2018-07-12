<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
	protected $table = 'bike_hotel';
    protected $fillable = [
		'bike_id', 'hotel_id', 'status'
	];

	public function hotel()
    {
    	return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function bike()
    {
    	return $this->belongsTo(Bike::class, 'bike_id');
    }
}
