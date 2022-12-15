<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('judul_buku');
            $table->string('image');
            $table->string('penulis_buku');
            $table->string('penerbit_buku');
            $table->integer('stok');
            $table->integer('jumlah_tersedia');
            $table->integer('jumlah_rusak');
            $table->integer('jumlah_pinjam');
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
        Schema::dropIfExists('books');
    }
};
