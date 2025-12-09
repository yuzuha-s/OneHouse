<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\LandLogController;
use App\Http\Controllers\LoanSimulationController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\UserController;
use App\Models\Maker;
use App\Models\MakerFeature;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/phase1', function () {
        return view('phase1'); 
    })->name('phase1');
});
require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('auth/register');
// });

Route::middleware('auth')->get('/phase1', function () {
    return view('phase1');
})->name('phase1');
// auth------------------------------------------
Route::get('/password_reset', function () {
    return view('auth/password_reset');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/password_help', function () {
    return view('auth/password_help');
});

Route::get('/setup', function () {
    return view('auth/setup');
});

// phase1~5------------------------------------------
Route::get('/phase1', function () {
    return view('phase1');
});


// Route::get('/phase1',[CheckListController::class, 'indexPhase1']);



Route::get('/phase2', function () {
    return view('phase2');
});
// 住宅メーカー一覧表示
Route::get('/phase2',[MakerController::class, 'index']);
Route::get('/phase2',[MakerController::class, 'index'])->name('phase2');

// 新規メーカー追加画面
Route::get('/phase2-edit',[MakerController::class, 'create'])->name('create');

// 新規メーカーを保存する
Route::post('/phase2-edit',[MakerController::class, 'store'])->name('store');

// 登録メーカー情報編集画面を表示する
Route::get('/phase2-update/{id}', [MakerController::class, 'edit'])->name('edit');

// 登録メーカー情報を変更する
Route::post('/phase2-update/{id}',[MakerController::class, 'update'])->name('update');

Route::delete('/phase2/{id}',[MakerController::class, 'destroy'])->name('destroy');

Route::get('/phase3', function () {
    return view('phase3');
});

//土地登録情報一覧を表示する
Route::get('/phase4',[LandLogController::class, 'index'])->name('phase4');

// 新しい土地を登録する・編集画面を表示する
Route::post('/phase4', [LandLogController::class, 'store'])->name('phase4.store');

// 土地情報を削除する
Route::delete('phase4/{id}', [LandLogController::class, 'destroy'])->name('phase4.destroy');

Route::get('/phase5', function () {
    return view('phase5');
});


// Route::get('/phase5',[CheckListController::class, 'indexPhase1']);
// Route::get('/phase5',[CheckListController::class, 'indexPhase5']);
