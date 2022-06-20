<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKategoriPengeluaran extends Migration
{
    public function up(){
        Schema::disableForeignKeyConstraints();
        Schema::table('pengeluarans', function(Blueprint $kolom){
            $kolom->foreignId('id_kategoriPengeluaran')
                  ->references('id')
                  ->on('kategori_pengeluarans')
                  ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }
}
