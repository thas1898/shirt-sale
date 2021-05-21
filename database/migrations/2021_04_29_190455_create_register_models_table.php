<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_models', function (Blueprint $table) {
            $table->id();
            $table->string("rname");
            $table->biginteger("rphone");
            $table->string("remail");
            $table->string("raddress");
            $table->string("rcity");
            $table->string("rstate");
            $table->integer("rpin");
            $table->string("rpassword");
            $table->string("type")->default('customer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_models');
    }
}
