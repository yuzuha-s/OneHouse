<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    public function run(): void
    {
        $profile = Profile::first() ?? Profile::create([
            'user_id' => 1,
        ]);
        $checklists = [
            [
                'profile_id' => $profile->id,
                'phase_id' => 1,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 2,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 3,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 4,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 5,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 6,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 7,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 8,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 9,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 10,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 11,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 12,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 13,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 14,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 15,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 16,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 17,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 18,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 19,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 20,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 21,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 22,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'phase_id' => 23,
                'checked' => false,
            ],


        ];

        foreach ($checklists as $checklist) {
            Checklist::firstOrCreate($checklist);
        }
    }
}
