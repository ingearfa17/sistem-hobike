<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    protected $table = 'kembali';

    protected $fillable = [
    	'sewa_id', 'hotel_id_kembali', 'total'
    ];
}
