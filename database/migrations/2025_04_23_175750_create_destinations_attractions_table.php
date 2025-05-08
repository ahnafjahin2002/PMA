<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsAttractionsTable extends Migration
{
    public function up()
    {
        Schema::create('destinations_attractions', function (Blueprint $table) {
            $table->id();
            $table->string('destination');  // Name of the destination (e.g., Cox's Bazar)
            $table->string('attraction');  // Name of the attraction (e.g., Cox's Bazar Beach)
            $table->text('description');   // Description of the attraction
            $table->mediumBlob('image')->nullable(); // Optional image URL for the attraction
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('destinations_attractions');
    }
}
