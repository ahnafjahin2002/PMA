<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TravelGroup;

class TravelGroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('travel_groups')->insert([
            [
                'id' => 1,
                'name' => 'Bandarban Adventure',
                'location' => 'Bandarban, Bangladesh',
                'description' => 'A group of adventure enthusiasts going on a trekking expedition to the hills and waterfalls of Bandarban.',
                'contact' => '01712345678',
                'cost' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Cox\'s Bazar Beach Trip',
                'location' => 'Cox\'s Bazar, Bangladesh',
                'description' => 'A relaxing trip to the longest sea beach in the world with white sands and a calm atmosphere.',
                'contact' => '01823456789',
                'cost' => 120.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Sundarbans Wildlife Safari',
                'location' => 'Sundarbans, Bangladesh',
                'description' => 'Explore the UNESCO World Heritage Sundarbans mangrove forest, home to tigers and rich biodiversity.',
                'contact' => '01934567890',
                'cost' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Sylhet Tea Garden Tour',
                'location' => 'Sylhet, Bangladesh',
                'description' => 'A peaceful tour of Sylhet’s lush tea gardens, experience the serenity and green landscapes.',
                'contact' => '01798765432',
                'cost' => 130.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
