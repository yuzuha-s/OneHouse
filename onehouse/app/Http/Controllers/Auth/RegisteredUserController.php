<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\LoanSimulation;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.setup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
        ]);

        $default = [
            1 => false,
            2 => false,
            3 => false,
            4 => false,
            5 => false,
            6 => false,
            7 => false,
            8 => false,
            9 => false,
            10 => false,
            11 => false,
            12 => false,
            13 => false,
            14 => false,
            15 => false,
            16 => false,
            17 => false,
            18 => false,
            19 => false,
            20 => false,
            21 => false,
            22 => false,
            23 => false,
        ];

        foreach ($default as $phase => $checked) {
            Checklist::create([
                'profile_id' => $profile->id,
                'phase_id' => $phase,
                'checked' => $checked,
            ]);
        }

        LoanSimulation::create([
            'profile_id' => $profile->id,
            'loan' => $request->loan ?? 0,
            'rate' => $request->rate ?? 0,
            'loan_term' => $request->loan_term ?? 0,
            'age' => $request->age ?? 0,
            'income' => $request->income ?? 0,
            'expense' => $request->expense ?? 0,
        ]);


        event(new Registered($user));

        Auth::login($user);
        $request->session()->flash('status', '登録されました');
        return redirect('phase1');
    }
}
