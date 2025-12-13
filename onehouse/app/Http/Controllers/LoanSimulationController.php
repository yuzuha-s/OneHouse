<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanSimulationRequest;
use App\Models\LoanSimulation;
use Illuminate\Http\Request;

class LoanSimulationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile ?: $user->profile()->create([]);
        $profileId = $profile->id;

        $loanSimulations = LoanSimulation::where('profile_id', $profileId)
            ->get();
        return view('default', compact('loanSimulations'));
    }

    // phase3のinput値を受け取る
    public function store(Request $request)
    {
        $user = auth()->user();

        // auth()->user() が null の場合
        if (!$user) {
            return response()->json(['error' => 'ログインしてください'], 401);
        }
        $profile = $user->profile ?: $user->profile()->create([]);
        $profileId = $profile->id;

        $validated = $request->validate([
            'loan' => 'required|numeric|min:1',
            'loan_term' => 'required|numeric|between:10,40',
            'age' => 'required|numeric|min:1',
            'rate' => 'required|numeric|min:0.1',
            'income' => 'required|numeric|min:1',
            'expense' => 'required|numeric|min:1',
        ]);


        LoanSimulation::updateOrcreate([
            'profile_id' => $profileId,
            'loan'        => $validated['loan'],
            'loan_term'   => $validated['loan_term'],
            'age'         => $validated['age'],
            'rate'        => $validated['rate'],
            'income'      => $validated['income'],
            'expense'     => $validated['expense'],
        ]);

        return response()->json([
            'message' => 'シミュレーションが完了しました！'
        ]);
    }

    // 登録データを表示する
    public function show(Request $request)
    {
        $user = $request->user();
        // auth()->user() が null の場合
        if (!$user) {
            return redirect('/phase1');
        }
        $profile = $user->profile ?: $user->profile()->create([]);
        $profileId = $profile->id;

        $loanSimulation = LoanSimulation::where('profile_id', $profileId)->first();
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




    public function update(LoanSimulationRequest $request)
    {
        $user = $request->user();
        // auth()->user() が null の場合
        if (!$user) {
            return response()->json(['error' => 'ログインしてください'], 401);
        }
        $profile = $user->profile ?: $user->profile()->create([]);
        $profileId = $profile->id;

        $validated =  $request->validated();


        $loanSimulations = LoanSimulation::updateOrCreate(
            ['profile_id' => $profileId],
            $validated + ['profile_id' => $profileId]
        );

        return response()->json([
            'data' => $loanSimulations
        ]);
    }
}
