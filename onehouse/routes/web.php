<?php

use App\Http\Controllers\Auth\UserSettingController;
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
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/setup', function () {
    return view('auth/setup');
});
Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

// auth------------------------------------------

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/phase1', [CheckListController::class, 'index'])->name('phase1');
    Route::get('/user_setting', function () {
        return view('auth/user_setting');
    });
    Route::post('/user_setting', [UserSettingController::class, 'update'])->name('user_setting');
});

// phase1~5------------------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/phase2', function () {
        return view('phase2');
    });

    // 住宅メーカー一覧表示
    Route::get('/phase2', [MakerController::class, 'index']);
    Route::get('/phase2', [MakerController::class, 'index'])->name('phase2');

    // 新規メーカー追加画面
    Route::get('/phase2-edit', [MakerController::class, 'create'])->name('create');

    // 新規メーカーを保存する
    Route::post('/phase2-edit', [MakerController::class, 'store'])->name('store');

    // 登録メーカー情報編集画面を表示する
    Route::get('/phase2-update/{id}', [MakerController::class, 'edit'])->name('edit');

    // 登録メーカー情報を変更する
    Route::post('/phase2-update/{id}', [MakerController::class, 'update'])->name('update');

    Route::delete('/phase2/{id}', [MakerController::class, 'destroy'])->name('destroy');

    Route::get('/phase3', function () {
        return view('phase3');
    });

    //土地登録情報一覧を表示する
    Route::get('/phase4', [LandLogController::class, 'index'])->name('phase4');

    // 新しい土地を登録する・編集画面を表示する
    Route::post('/phase4', [LandLogController::class, 'store'])->name('phase4.store');

    // 土地情報を削除する
    Route::delete('phase4/{id}', [LandLogController::class, 'destroy'])->name('phase4.destroy');
});
