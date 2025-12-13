<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\LoanSimulationController;
use App\Http\Controllers\PhaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// ローンシミュレーションの更新・データ履歴の表示
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/phase3', [LoanSimulationController::class, 'show']);
    Route::put('/phase3', [LoanSimulationController::class, 'update']);
});


// チェックリストの登録・更新・削除
Route::post('/checklist', [CheckListController::class, 'store']);
Route::put('/checklist/{id}', [CheckListController::class, 'update']);
Route::delete('/checklist/{id}', [CheckListController::class, 'destroy']);
