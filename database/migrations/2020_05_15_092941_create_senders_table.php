<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senders', function (Blueprint $table) {
            $table->string('cnp', 32);
            $table->primary('cnp');
            $table->string('phone');
            $table->timestamps();
            $table->integer('user_fk_id')->unsigned();
            $table->foreign('user_fk_id')->references('user_id')->on('users');
            $table->integer('adr_fk_code')->unsigned();
            $table->foreign('adr_fk_code')->references('sender_code')->on('sender_adresses');
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
        Schema::dropIfExists('senders');
    }
}
