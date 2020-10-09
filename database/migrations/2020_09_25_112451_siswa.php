<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Siswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('nip');
            $table->string('nama',100);
            $table->string('tanggal_lahir',100);
            $table->string('kelas',100);
            $table->string('jurusan',100);
            $table->text('alamat');
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
        Schema::dropIfExists('siswa');
    }
}
