<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id_paym');
            $table->string('sum_payment');
            $table->string('details');
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id_paymbill')->on('payment_bills');
            // $table->string('id_meth', 32)->index();
            // $table->foreign('id_meth')->references('id')->on('payment_meths');
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
        Schema::dropIfExists('payments');
    }
}
