<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    protected $fillable = [
        'id_user', 'keluhan', 'id_dinas', 'jenis_pesan','alamat',
    ];

    public function User(){
    	return $this->belongsTo('App\Dinas','id_dinas','id');
    }
    
   
}