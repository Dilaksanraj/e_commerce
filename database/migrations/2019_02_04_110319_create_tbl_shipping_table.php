<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shipping_email');
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_address1');
            $table->string('shipping_address2');
            $table->string('shipping_mobile_number');
            $table->string('shipping_city');
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
        Schema::dropIfExists('tbl_shipping');
    }
}
