<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalExperienceBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('local_experience_bookings', function (Blueprint $table) {
            $table->id();

            // Foreign key to local_experiences table
            $table->foreignId('local_experience_id')->constrained()->onDelete('cascade');

            // Foreign key to users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Booking details
            $table->string('name');
            $table->string('email');
            $table->string('mobile_number');
            $table->date('booking_date');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_experience_bookings');
    }
}
