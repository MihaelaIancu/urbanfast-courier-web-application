<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id_transp');
            $table->string('details');
            $table->string('type');
            $table->string('vehicle');
            $table->integer('driver')->unsigned();
            $table->foreign('driver')->references('id_courier')->on('couriers');
            $table->integer('id_for')->unsigned();
            $table->foreign('id_for')->references('id_foreman')->on('deposit_foremen');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
