<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('adr_code');
            $table->string('adress'); 
            $table->string('zip_code');
            $table->timestamps();
        });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->unsignedBigInteger('adress_code');
        //     $table->foreign('adress_code')->references('adr_code')->on('adresses')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
}
