<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komen extends Model
{
    //
        protected $table = 'komen';
        protected $primaryKey = 'id';
        protected $fillable = ['idforum','isi','gambar','userID'];
        public function forum(){
            return $this->belongsTo('App\forum');
        }
        public function user(){
            return $this->belongsTo('App\user');
        }   
}
