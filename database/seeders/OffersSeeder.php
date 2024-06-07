<?php

namespace Database\Seeders;

use App\Models\Offers;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = Offers::factory()->count(100)->create();
        $users = User::all();

        $partnerIds = $offers->pluck('partner_id')->toArray(); // Get all partner IDs

        foreach ($users as $user) {
            foreach ($offers as $index => $offer) {
                $user->offer()->attach($offer->id, ['accepted' => 0, 'partner_id' => $partnerIds[$index]]);
            }
        }
    }
}
