<?php

namespace Database\Seeders;

use App\Models\Offers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offers::factory()->count(1000)->create();
    }
}
