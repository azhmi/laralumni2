<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bukutamu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bukutamu', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nama');
            $table->string('judul');
            $table->string('telp'); 
            $table->text('pesan');
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
            Schema::dropIfExists('bukutamu');
        //
    }
}
