<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    //
    protected $table = 'forum';
    protected $primaryKey = 'id';
    protected $fillable = ['judul','slug','gambar','isi','userID', 'id_kategori'];
    public function kategori(){
        return $this->belongsTo('App\kategori');
    }
    public function komen(){
    	return $this->hasMany('App\komen','idforum');
    }
    public function user(){
        return $this->belongsTo('App\user');
    }   
    
}
