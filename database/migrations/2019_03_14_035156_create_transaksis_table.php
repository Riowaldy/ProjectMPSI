<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->string('ukuran');
            $table->integer('harga_total');
            
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('CASCADE');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
