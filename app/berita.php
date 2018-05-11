<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    //
    protected $table = 'berita';
    protected $primaryKey = 'id';
    protected $fillable = ['userID','judul','slugjudul','isi','gambar'];

    public function user(){
        return $this->belongsTo('App\user');
    }   
}
