<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bukutamu extends Model
{
    //
    protected $table = 'bukutamu';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','judul','telp','pesan'];

}
