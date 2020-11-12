<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_bills', function (Blueprint $table) {
            $table->increments('id_paymbill');
            $table->string('details');
            $table->integer('user_fk_id')->unsigned();
            $table->foreign('user_fk_id')->references('user_id')->on('users');
            $table->integer('adr_fk_code')->unsigned();
            $table->foreign('adr_fk_code')->references('adr_code')->on('adresses');
            $table->timestamp('created_at')->nullable();
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
        Schema::dropIfExists('payment_bills');
    }
}
