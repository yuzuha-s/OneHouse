<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanSimulationRequest;
use App\Models\LoanSimulation;
use Illuminate\Http\Request;

class LoanSimulationController extends Controller
{
    public function index()
    {
        $loanSimulations = LoanSimulation::with('profile')->get();
        return view('default', compact('loanSimulations'));
    }


    public function create()
    {
        //
    }

    // phase3のinput値を受け取る
    public function store(Request $request)
    {

        $validated = $request->validate([
            'loan' => 'required|numeric|min:1',
            'loan_term' => 'required|numeric|between:10,40',
            'age' => 'required|numeric|min:1',
            'rate' => 'required|numeric|min:0.1',
            'income' => 'required|numeric|min:1',
            'expense' => 'required|numeric|min:1',
        ]);
        $profileId = auth()->user()->profile->id;

        LoanSimulation::create([
            'profile_id' => $profileId,
        ]);

        return response()->json([
            'message' => 'シミュレーションが完了しました！'
        ]);
    }

    // 登録データを表示する
    public function show(string $id)
    {
        $loanSimulation = LoanSimulation::where('profile_id', 1)
            ->latest('updated_at')
            ->first();
        if (!$loanSimulation) {
            return response()->json([
                'loan' => 0,
                'loan_term' => 0,
                'age' => 0,
                'rate' => 0,
                'income' => 0,
                'expense' => 0,
                'updated_at' => null,

            ]);
        }

        return response()->json([
            'loan' => $loanSimulation->loan,
            'loan_term' => $loanSimulation->loan_term,
            'age' => $loanSimulation->age,
            'rate' => $loanSimulation->rate,
            'income' => $loanSimulation->income,
            'expense' => $loanSimulation->expense,
            'updated_at' => $loanSimulation->updated_at?->format('Y/m/d H:i') ?? null,

        ]);
    }


    public function edit(string $id)
    {
        //
    }

    public function update(LoanSimulationRequest $request, $id)
    {
        $validated =  $request->validated();
        $profile_id = 1;

        $loanSimulations = LoanSimulation::updateOrCreate(
            ['profile_id' => $profile_id],
            $validated + ['profile_id' => $profile_id]
        );

        return response()->json([
            'data' => $loanSimulations
        ]);
    }


    public function destroy(string $id)
    {
        //
    }
}
