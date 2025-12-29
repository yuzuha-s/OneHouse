<?php

namespace Database\Seeders;

use App\Models\ChecklistTemplate;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $profile = Profile::first() ?? Profile::create([
            'user_id' => 1,
        ]);

        $checklistTemplates = [
            [
                'profile_id' => $profile->id,
                'template_list_id' => 1,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 2,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 3,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 4,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 5,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 6,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 7,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 8,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 9,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 10,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 11,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 12,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 13,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 14,
                'checked' => true,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 15,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 16,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 17,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 18,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 19,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 20,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 21,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 22,
                'checked' => false,
            ],
            [
                'profile_id' => $profile->id,
                'template_list_id' => 23,
                'checked' => false,
            ],

        ];

        foreach ($checklistTemplates as $checklistTemplate) {
            ChecklistTemplate::firstOrCreate($checklistTemplate);
        }
    }
}
