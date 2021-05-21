<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("vendorid");
            $table->foreign("vendorid")->references("id")->on("vendor_models");
            $table->unsignedBigInteger("proid");
            $table->foreign("proid")->references("id")->on("product_models");
            $table->integer("pqty");
            $table->integer("pprice");
            $table->integer("ptotal");
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
        Schema::dropIfExists('purchase_models');
    }
}
