<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanSimulationRequest;
use App\Models\LoanSimulation;
use Illuminate\Http\Request;

class LoanSimulationController extends Controller
{
    public function index()
    {

        return view('phase3');
    }
    public function chartApi()
    {
        return response()->json([
            'years' => [], //x軸
            'incomeData' => [],
            'expenseData' => [],
            'principalPaymentData' => [],
            'interestPaymentData' => [],
        ]);
    }

    public function showLoanChart(Request $request)
    {
        $loan = $request->input('loan', 1000);
        $rate = $request->input('rate', 1.0);
        $loan_term = $request->input('loan_term', 30);
        $age = $request->input('age', 25);
        $expense = $request->input('expense', 20);
        $income = $request->input('income', 400);

        return view('phase3', compact(
            'loan',
            'rate',
            'loan_term',
            'age',
            'expense',
            'income'
        ));
    }
}
