<?php

// namespace Database\Seeders;

// use App\Models\LoanSimulation;
// use App\Models\Profile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class LoanSimulationSeeder extends Seeder
// {
//     public function run(): void
//     {
//         $profile = Profile::first() ?? Profile::create([
//             'user_id' => 1,
//         ]);
//         $loanSimulation = [
//             [
//                 'profile_id' => $profile->id,
//                 'loan' => 6000,
//                 'rate' => 1.5,
//                 'loan_term' => 35,
//                 'age' => 32,
//                 'income' => 800,
//                 'expense' => 25,
//             ],

//         ];

//         foreach ($loanSimulation as $value) {
//             LoanSimulation::firstOrCreate($value);
//         }
//     }
// }
