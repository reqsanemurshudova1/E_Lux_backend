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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('profile_photo')->nullable(); // Profil şəkli
            $table->string('profile_name'); // Profil adı
            $table->text('comment'); // Şərh
            $table->unsignedInteger('like')->default(0); // Like sayı
            $table->unsignedInteger('dislike')->default(0); // Dislike sayı
            $table->timestamp('time')->nullable(); // Vaxt
            $table->unsignedInteger('common_review')->default(0); // Ümumi baxış sayı
            $table->unsignedBigInteger('product_id'); // Məhsul ID-si
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Xarici açar
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
