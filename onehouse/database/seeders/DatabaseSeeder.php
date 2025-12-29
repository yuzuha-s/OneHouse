<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            MakerSeeder::class,
            CategorySeeder::class,
            FeatureSeeder::class,
            MakerFeatureSeeder::class,
            LandLogSeeder::class,
            TemplateListSeeder::class,
            ChecklistTemplateSeeder::class,
        ]);
    }
}
