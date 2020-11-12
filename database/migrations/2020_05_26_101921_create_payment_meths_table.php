<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_meths', function (Blueprint $table) {
            $table->id();
            // $table->string('method');
            // $table->string('cnp_fk', 32)->index();
            // $table->foreign('cnp_fk')->references('cnp')->on('senders');
            // $table->integer('id_ramb_fk')->unsigned();
            // $table->foreign('id_ramb_fk')->references('id_ramb')->on('ramburs');
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
        Schema::dropIfExists('payment_meths');
    }
}
