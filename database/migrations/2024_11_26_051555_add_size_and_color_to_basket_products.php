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
        Schema::table('basket_products', function (Blueprint $table) {
            $table->string('selected_size')->nullable();
            $table->string('selected_color')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basket_products', function (Blueprint $table) {
            //
        });
    }
};
