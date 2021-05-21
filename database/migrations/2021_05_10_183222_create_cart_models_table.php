<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cid");
            $table->foreign("cid")->references("id")->on("register_models");
            $table->unsignedBigInteger("proid");
            $table->foreign("proid")->references("id")->on("product_models");
            $table->integer("cqty");
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
        Schema::dropIfExists('cart_models');
    }
}
