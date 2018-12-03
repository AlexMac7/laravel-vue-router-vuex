<?php

use App\HolidayDestination;
use Illuminate\Database\Seeder;

class HolidayDestinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HolidayDestination::class)->create([
            'name' => 'Vegas',
            'slug' => 'vegas',
            'location' => 'Las Vegas',
            'description' => 'We will site see, people watch, enjoy the pool and warm weather, drink interesting cocktails and slushies and eat lots of good food.',
            'price' => 200000,
        ]);
        factory(HolidayDestination::class)->create([
            'name' => 'All Inclusive Resort',
            'slug' => 'all-inclusive',
            'location' => 'Mexico',
            'description' => 'We will relax, enjoy the pool, ocean and warm weather, drink interesting cocktails and slushies and get sun burned! :)',
            'price' => 200000,
        ]);
        factory(HolidayDestination::class)->create([
            'name' => 'Coastal Cabin',
            'slug' => 'cabin',
            'location' => 'Sunshine or Oregon Coast',
            'description' => 'We will detach from technology for a bit, relax by a fire, storm watch and go on a hike or two.',
            'price' => 200000,
        ]);
    }
}
