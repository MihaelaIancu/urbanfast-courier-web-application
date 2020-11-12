<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('route_no');
            $table->integer('adr_fk_sender')->unsigned();
            $table->foreign('adr_fk_sender')->references('sender_code')->on('sender_adresses');
            $table->integer('adr_fk_receiver')->unsigned();
            $table->foreign('adr_fk_receiver')->references('receiver_code')->on('receiver_adresses');
            $table->integer('id_fk_zone')->index();
            $table->foreign('id_fk_zone')->references('id_deliv')->on('delivery_zones');
            $table->integer('id_fk_transp')->unsigned();
            $table->foreign('id_fk_transp')->references('id_transp')->on('transports');
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
        Schema::dropIfExists('routes');
    }
}
