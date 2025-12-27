<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $userData = [
            ['name' => 'Test User', 'email' => 'test@example.com', 'password' => bcrypt('password')],
            ['name' => 'gest', 'email' => 'gest@ex.jp', 'password' => bcrypt('pass123')],
        ];

        foreach ($userData as $data) {
            $user = User::firstOrCreate(['email' => $data['email']], $data);

            Profile::firstOrCreate(['user_id' => $user->id]);
        }
    }
}
