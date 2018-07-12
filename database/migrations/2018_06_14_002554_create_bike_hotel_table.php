<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikeHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bike_hotel', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bike_id');
            $table->unsignedInteger('hotel_id');
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::table('bike_hotel', function(Blueprint $table){
            $table->foreign('bike_id')
                    ->references('id')
                    ->on('bikes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('hotel_id')
                    ->references('id')
                    ->on('hotels')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bike_hotel');
    }
}
