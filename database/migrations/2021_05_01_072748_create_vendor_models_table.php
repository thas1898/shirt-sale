<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_models', function (Blueprint $table) {
            $table->id();
            $table->string("vname");
            $table->string("vcname");
            $table->string("vaddress");
            $table->string("vstate");
            $table->biginteger("vphone");
            $table->string("vemail");
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
        Schema::dropIfExists('vendor_models');
    }
}
