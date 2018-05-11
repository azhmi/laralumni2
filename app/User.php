<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $incrementing = false;
    protected $primaryKey = 'NIS';
    protected $fillable = [
        'NIS','nama','foto', 'level','alamat','telp','ayah','ibu','angkatan','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function status()
    {
        return $this->hasOne('App\status','userID');
    }
    public function berita()
    {
        return $this->hasMany('App\berita','userID');
    }
    public function forum()
    {
        return $this->hasMany('App\forum','userID');
    }
    public function komen()
    {
        return $this->hasMany('App\komen','userID');
    }
    

}
