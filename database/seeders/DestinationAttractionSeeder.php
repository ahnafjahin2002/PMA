<?php
namespace Database\Seeders;

use App\Models\DestinationAttraction;
use Illuminate\Database\Seeder;

class DestinationAttractionSeeder extends Seeder
{
    public function run()
    {
        DB::table('destinations_attractions')->insert([
            [
                'id' => 1,
                'destination' => 'Cox\'s Bazar',
                'attraction' => 'Cox\'s Bazar Beach',
                'description' => 'The longest natural sea beach in the world.',
                'image' => 'cox_bazar_beach.jpg', // Use real image path or URL
                'created_at' => '2025-04-23 18:00:23',
                'updated_at' => '2025-04-23 18:00:23',
            ],
            [
                'id' => 2,
                'destination' => 'Sundarbans, Khulna Division',
                'attraction' => 'Royal Bengal Tiger and Mangrove Forest',
                'description' => 'Sundarbans is the largest mangrove forest in the world, home to the Royal Bengal Tiger.',
                'image' => 'sundarbans_forest.jpg', // Use real image path or URL
                'created_at' => '2025-04-27 15:00:00',
                'updated_at' => '2025-04-27 15:00:00',
            ],
            [
                'id' => 3,
                'destination' => 'Sadapathor, Bholagonj',
                'attraction' => 'Bholagonj Waterfall',
                'description' => 'Destination Guide: Sadapathor, Bholagonj, Companigonj, Sylhet. A peaceful and scenic waterfall destination.',
                'image' => 'bholagonj_waterfall.jpg', // Use real image path or URL
                'created_at' => '2025-04-27 14:00:00',
                'updated_at' => '2025-04-27 14:00:00',
            ]
        ]);
    }
}
