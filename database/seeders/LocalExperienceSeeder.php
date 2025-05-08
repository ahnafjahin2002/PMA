<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalExperiencesSeeder extends Seeder
{
    public function run()
    {
        DB::table('local_experiences')->insert([
            [
                'id' => 1,
                'destination' => 'Cox\'s Bazar',
                'attraction' => 'Cox\'s Bazar Beach',
                'description' => 'The longest natural sea beach in the world, located in Bangladesh.',
                'image' => 'cox_bazar_beach.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'destination' => 'Sundarbans',
                'attraction' => 'Sundarbans Reserve Forest',
                'description' => 'A UNESCO World Heritage Site and home to the Royal Bengal Tiger.',
                'image' => 'sundarbans_forest.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'destination' => 'Sylhet',
                'attraction' => 'Jaflong',
                'description' => 'Known for its tea gardens, hills, and natural beauty.',
                'image' => 'jaflong_tea_gardens.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'destination' => 'Khulna',
                'attraction' => 'Kenduli',
                'description' => 'Famous for Baul music (traditional folk songs).',
                'image' => 'kenduli_baul_music.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'destination' => 'Barisal',
                'attraction' => 'Kuakata',
                'description' => 'Known for its unique ability to view both the sunrise and sunset from the same beach.',
                'image' => 'kuakata_beach.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'destination' => 'Rajshahi',
                'attraction' => 'Puthia Temple Complex',
                'description' => 'A beautiful collection of Hindu temples with intricate terracotta work.',
                'image' => 'puthia_temple.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'destination' => 'Chittagong',
                'attraction' => 'Patenga Beach',
                'description' => 'A serene beach located in the heart of the port city.',
                'image' => 'patenga_beach.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'destination' => 'Rajshahi',
                'attraction' => 'Varendra Research Museum',
                'description' => 'A museum showcasing the ancient cultural and historical artifacts of Bengal.',
                'image' => 'varendra_museum.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'destination' => 'Tangail',
                'attraction' => 'Jamuna River Cruise',
                'description' => 'A relaxing boat cruise along the scenic Jamuna River.',
                'image' => 'jamuna_river_cruise.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'destination' => 'Comilla',
                'attraction' => 'Mainamati Ruins',
                'description' => 'An ancient Buddhist site with monasteries, stupas, and temples dating back to the 7th century.',
                'image' => 'mainamati_ruins.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'destination' => 'Mymensingh',
                'attraction' => 'Brahmaputra River',
                'description' => 'Take a boat ride on the mighty Brahmaputra River, which flows through Mymensingh.',
                'image' => 'brahmaputra_river.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'destination' => 'Noakhali',
                'attraction' => 'Hakaluki Haor',
                'description' => 'A freshwater swamp forest, ideal for bird watching and boat rides.',
                'image' => 'hakaluki_haor.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'destination' => 'Barisal',
                'attraction' => 'Floating Guava Market',
                'description' => 'A unique floating market on rivers where guavas are sold on boats.',
                'image' => 'floating_guava_market.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'destination' => 'Patuakhali',
                'attraction' => 'Kuakata Sea Beach',
                'description' => 'A beach where you can witness both sunrise and sunset, located in the southern part of Bangladesh.',
                'image' => 'kuakata_sea_beach.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'destination' => 'Dinajpur',
                'attraction' => 'Kantaji Temple',
                'description' => 'A Hindu temple with exquisite terracotta works, one of the most beautiful temples in Bangladesh.',
                'image' => 'kantaji_temple.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'destination' => 'Brahmanbaria',
                'attraction' => 'Kantaji Temple',
                'description' => 'A beautiful terracotta Hindu temple with rich history and heritage.',
                'image' => 'brahmanbaria_kantaji.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
