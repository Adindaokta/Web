<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Gunung Panderman',
                'description' => 'Nikmati pendakian santai dengan pemandangan Kota Batu dari ketinggian.',
                'category' => 'hiking',
                'image' => 'images/panderman.jpg',
                'price' => 150000,
                'location' => 'Batu, Jawa Timur',
            ],
            [
                'name' => 'Bukit Teletubbies Bromo',
                'description' => 'Rasakan trekking ringan di padang rumput Bromo yang indah.',
                'category' => 'trekking',
                'image' => 'images/teletubbies.jpg',
                'price' => 200000,
                'location' => 'Probolinggo, Jawa Timur',
            ],
            [
                'name' => 'Ranu Kumbolo Camp',
                'description' => 'Camping di tepi danau legendaris dengan sunrise terbaik di Semeru.',
                'category' => 'camping',
                'image' => 'images/ranukumbolo.jpg',
                'price' => 300000,
                'location' => 'Lumajang, Jawa Timur',
            ],
        ];

        foreach ($destinations as $data) {
            Destination::create($data);
        }
    }
}
