<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\ChecklistTemplate;
use App\Models\Phase;
use App\Models\Profile;
use App\Models\TemplateList;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
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


        $templateLists = TemplateList::all();
        foreach ($templateLists as $templateList) {
            ChecklistTemplate::create([
                'profile_id' => $profile->id,
                'template_list_id' => $templateList->id
            ]);
        }

        event(new Registered($user));
        Auth::login($user);

        $request->session()->flash('status', '登録されました');
        return redirect('phase1');
    }
}
