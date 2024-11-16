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
        Schema::create('products_description', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('material');
            $table->string('care_instructions');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            // Foreign key
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_description');
    }
};
