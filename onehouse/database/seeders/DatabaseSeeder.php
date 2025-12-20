<?php

namespace Database\Seeders;

use App\Models\LandLog;
use App\Models\LoanSimulation;
use App\Models\MakerFeature;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\FeatureSet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            MakerSeeder::class,
            CategorySeeder::class,
            FeatureSeeder::class,
            MakerFeatureSeeder::class,
            // LoanSimulationSeeder::class,
            LandLogSeeder::class,
            PhaseSeeder::class,
            ChecklistSeeder::class,
        ]);
    }
}
