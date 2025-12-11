<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{

    public function create(Request $request): View
    {
        return view('auth.password_help');
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            // 'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ], [
            'password.max' => 'パスワードは8文字以下で入力してください。',
        ]);

        // メールアドレスが登録されているか確認
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'このメールアドレスは登録されておりません']);
        }

        // パスワード更新
        $user->password = Hash::make($request->password);
        $user->save();

        // 成功後 phase1 へ遷移
        return redirect()->route('login')->with('status', 'パスワードを更新しました');
    }
}
