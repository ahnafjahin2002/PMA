<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('local_experiences', function (Blueprint $table) {
            $table->id();  // Auto-increment ID
            $table->string('destination');  // Name of the destination (e.g., "Cox's Bazar")
            $table->string('attraction');  // Name of the attraction (e.g., "Cox's Bazar Beach")
            $table->text('description');   // Description of the attraction
            $table->string('image')->nullable();  // Optional image URL for the destination/attraction
            $table->timestamps();  // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_experiences');
    }
}
