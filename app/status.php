<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    //
    protected $table = 'status';
    protected $primaryKey = 'id';
    protected $fillable = ['nim','nikah','kerja','kuliah'];
    public function user(){
        return $this->belongsTo('App\user','NIS');
    }   
}
