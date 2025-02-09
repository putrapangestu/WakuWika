<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinumansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minumans', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("gambar");
            $table->foreignId("id_kategori");
            $table->string("pilihan");
            $table->bigInteger("harga");
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
        Schema::dropIfExists('minumans');
    }
}
