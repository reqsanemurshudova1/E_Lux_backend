<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('fullName');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('streetAddress');
            $table->string('city');
            $table->string('state');
            $table->string('postalCode');
            $table->decimal('shippingCost', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping_addresses');
    }
}