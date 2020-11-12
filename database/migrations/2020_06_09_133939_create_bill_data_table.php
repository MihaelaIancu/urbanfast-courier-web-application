<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_data', function (Blueprint $table) {
            $table->id();
            $table->integer('user_fk_id')->unsigned();
            $table->foreign('user_fk_id')->references('user_id')->on('users');
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('receiver_name');
            $table->string('receiver_adress');
            $table->string('receiver_zip');
            $table->string('payment_adress');
            $table->integer('pack_fk_id')->unsigned();
            $table->foreign('pack_fk_id')->references('pack_code')->on('packages');
            $table->string('paym_value');
            $table->string('ramburs');
            $table->string('deliv_taxes');
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
        Schema::dropIfExists('bill_data');
    }
}
