<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        Lot::factory(50)->create()->each(function ($lot) use ($categories) {
            $lot->categories()->attach($categories->random(rand(1, 4)));
        });
    }
}
