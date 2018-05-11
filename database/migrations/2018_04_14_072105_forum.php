<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Forum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('forum', function(Blueprint $table){
            $table->increments('id');
            $table->string('judul');
            $table->string('slug');
            $table->string('gambar');
            $table->text('isi');
            $table->Integer('userID');  
            $table->Integer('id_kategori');
            $table->timestamps();                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        //
        Schema::dropIfExists('forum');
    }
}
