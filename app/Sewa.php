<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table = 'sewas';

    protected $fillable = [
    	'bike_id', 'member_id', 'hotel_id_awal', 'hotel_id_kembali', 'total'
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    public function hotelAwal()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id_awal');
    }

    public function hotelKembali()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id_kembali');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function bike()
    {
        return $this->belongsTo(Bike::class, 'bike_id');
    }


}
