<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('shipping_methods', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('price', 8, 2);
        $table->text('description')->nullable();
        $table->string('delivery_time')->nullable();
        $table->text('restrictions')->nullable();
        $table->string('carrier')->nullable();
        $table->decimal('min_amount', 8, 2)->nullable();
        $table->decimal('max_amount', 8, 2)->nullable();
        $table->decimal('additional_charges', 8, 2)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
