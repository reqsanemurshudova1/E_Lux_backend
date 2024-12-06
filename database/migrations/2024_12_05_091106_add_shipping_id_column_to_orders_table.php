<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('shipping_adress_id')->nullable(); // Ensure the column name matches the model
            $table->foreign('shipping_adress_id')->references('id')->on('shipping_addresses')->onDelete('set null'); // Correct the table name and relationship
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['shipping_adress_id']);
            $table->dropColumn('shipping_adress_id');
        });
    }
};
