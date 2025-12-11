<?php

use App\Http\Controllers\CheckListController;
use App\Http\Controllers\LoanSimulationController;
use App\Http\Controllers\PhaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// ローンシミュレーションの更新・データ履歴の表示
// Route::put('/phase3/{profile_id}', [LoanSimulationController::class, 'update']);
Route::get('/phase3/{profile_id}', [LoanSimulationController::class, 'show']);
Route::middleware('auth:sanctum')->put('/phase3/{profile_id}', [LoanSimulationController::class, 'update']);

// チェックリストの登録・更新・削除
Route::post('/checklist',[CheckListController::class, 'store']);
Route::put('/checklist/{id}',[CheckListController::class, 'update']);
Route::delete('/checklist/{id}',[CheckListController::class, 'destroy']);
