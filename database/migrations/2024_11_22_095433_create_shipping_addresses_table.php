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
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->decimal('shipping_cost', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping_addresses');
    }
}
