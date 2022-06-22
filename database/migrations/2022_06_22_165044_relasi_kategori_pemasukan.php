<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKategoriPemasukan extends Migration
{
    public function up(){
        Schema::disableForeignKeyConstraints();
        Schema::table('pemasukans', function(Blueprint $kolom){
            $kolom->foreignId('id_kategoriPemasukan')
                  ->references('id')
                  ->on('kategori_pemasukans')
                  ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }
}
