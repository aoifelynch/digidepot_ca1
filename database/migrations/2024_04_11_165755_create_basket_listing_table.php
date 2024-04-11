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
        Schema::create('basket_listing', function (Blueprint $table) {
            $table->foreignId('listing_id');
            $table->foreign('listing_id')->references('id')->on('listings');
            $table->foreignId('basket_id');
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings_baskets');
    }
};
