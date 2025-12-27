<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CheckListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// チェックリストの登録・更新・削除


// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/checklist', [CheckListController::class, 'store']);
//     Route::put('/checklist/{id}', [CheckListController::class, 'update']);
//     Route::delete('/checklist/{id}', [CheckListController::class, 'destroy']);
// });
