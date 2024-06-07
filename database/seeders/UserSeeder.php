<?php

namespace Database\Seeders;

use App\Models\Linking;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(100)->create();

        foreach ($users as $user) {
            // linkings
            for ($i = 0; $i < 10; $i++) {
                $linkedUserId = rand(1, 100);

                // Ensure the generated ID is not the same as the current user's ID
                while ($linkedUserId == $user->id) {
                    $linkedUserId = rand(1, 100);
                }

                $existingLinking = Linking::where('user_id', $user->id)
                    ->where('linked_user_id', $linkedUserId)
                    ->first();

                if (!$existingLinking) {
                    $linking = new Linking([
                        'user_id' => $user->id,
                        'linked_user_id' => $linkedUserId,
                        'accepted' => rand(0, 1),
                    ]);
                    $linking->save();

                    $linkedBy = new Linking([
                        'user_id' => $linkedUserId,
                        'linked_user_id' => $user->id,
                        'accepted' => $linking->accepted,
                    ]);
                    $linkedBy->save();
                }
            }
        }
    }
}
