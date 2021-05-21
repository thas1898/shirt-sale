<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->string("pname");
            $table->unsignedBigInteger("catid");
            $table->foreign("catid")->references("id")->on("category_models");
            $table->unsignedBigInteger("brandid");
            $table->foreign("brandid")->references("id")->on("brand_models");
            $table->string("pdesc");
            $table->string("size");
            $table->string("sleeve");
            $table->string("fit");
            $table->integer("pprice"); 
            $table->integer("pqty")->default('0'); 
            $table->string("pimg1");
            $table->string("pimg2");
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
        Schema::dropIfExists('product_models');
    }
}
