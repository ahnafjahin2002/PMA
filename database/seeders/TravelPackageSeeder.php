<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TravelPackage;

class TravelPackageSeeder extends Seeder
{
    public function run()
    {
        DB::table('travel_packages')->insert([
            [
                'id' => 1,
                'name' => 'Sundarbans Adventure',
                'description' => 'Explore the largest mangrove forest in the world, with rich wildlife and picturesque landscapes.',
                'price' => 15000.00,
                'image' => file_get_contents(public_path('images/sundarbans.jpg')), // Add actual image path
                'eco_friendly' => 'eco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Cox\'s Bazar Beach Holiday',
                'description' => 'Relax at the longest natural sea beach in the world with stunning views and pleasant weather.',
                'price' => 12000.00,
                'image' => file_get_contents(public_path('images/coxsbazar.jpg')), // Add actual image path
                'eco_friendly' => 'Non-eco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Sylhet Tea Garden Experience',
                'description' => 'Visit the picturesque tea gardens in Sylhet. Walk through the rolling hills with green fields of tea.',
                'price' => 8500.00,
                'image' => file_get_contents(public_path('images/sylhet.jpg')), // Add actual image path
                'eco_friendly' => 'eco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Hill Tracts of Bandarban',
                'description' => 'Explore the hills and waterfalls of Bandarban. Trek through the beautiful nature trails and enjoy stunning views.',
                'price' => 20000.00,
                'image' => file_get_contents(public_path('images/bandarban.jpg')), // Add actual image path
                'eco_friendly' => 'eco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Paharpur Buddhist Vihara Tour',
                'description' => 'Visit the ancient Buddhist ruins of Paharpur, a UNESCO World Heritage Site that holds historical significance.',
                'price' => 10000.00,
                'image' => file_get_contents(public_path('images/paharpur.jpg')), // Add actual image path
                'eco_friendly' => 'Non-eco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Srimangal - The Land of Two Leaves',
                'description' => 'A tour to Srimangal, famous for its tea estates, lush greenery, and peaceful atmosphere.',
                'price' => 9000.00,
                'image' => file_get_contents(public_path('images/srimangal.jpg')), // Add actual image path
                'eco_friendly' => 'eco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Saint Martin\'s Island Relaxation',
                'description' => 'Enjoy the beautiful coral island with turquoise waters, ideal for relaxation and water activities.',
                'price' => 18000.00,
                'image' => file_get_contents(public_path('images/saintmartin.jpg')), // Add actual image path
                'eco_friendly' => 'eco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
