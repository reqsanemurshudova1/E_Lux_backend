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
        Schema::create('ourservice_items', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->text('description');
            $table->string('icon');
            $table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ourservice_items');
    }
};
