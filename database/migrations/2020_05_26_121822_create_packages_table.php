<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('pack_code');
            $table->string('height');
            $table->string('width');
            $table->string('length');
            $table->string('weigth_kg');
            $table->string('content');
            $table->string('details');
            $table->string('status');
            $table->string('user_cnp');
            $table->string('payment_method');
            // $table->foreign('user_cnp')->references('cnp')->on('senders');
            // $table->string('id_meth')->unsigned();
            // // $table->foreign('id_meth')->references('id')->on('payment_meths');
            // $table->integer('id_fk_deposit')->unsigned();
            // $table->foreign('id_fk_deposit')->references('id_deposit')->on('deposits');
            // $table->integer('id_fk_transp')->unsigned();
            // $table->foreign('id_fk_transp')->references('id_transp')->on('transports');
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
        Schema::dropIfExists('packages');
    }
}
