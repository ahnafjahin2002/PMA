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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('hotel_id'); // Primary key
            $table->string('hotel_name');
            $table->text('address');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2); // For price like 99999.99
            $table->mediumBlob('image')->nullable();
            $table->timestamps();
        });
    }   


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
