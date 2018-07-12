<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKembaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kembali', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sewa_id')->unsigned();
            $table->string('hotel_id_kembali', 10);
            $table->string('total');
            $table->timestamps();

            $table->foreign('sewa_id')
                  ->references('id')->on('sewas')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('hotel_id_kembali')
                  ->references('id')->on('hotels')
                  ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kembali');
    }
}
