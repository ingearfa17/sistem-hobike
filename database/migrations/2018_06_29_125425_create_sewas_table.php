<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned();
            $table->integer('bike_id')->unsigned();
            $table->string('hotel_id_awal', 10);
            $table->string('total');
            $table->timestamps();

            $table->foreign('member_id')
                  ->references('id')->on('members')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('bike_id')
                  ->references('id')->on('bikes')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('hotel_id_awal')
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
        Schema::dropIfExists('sewas');
    }
}
