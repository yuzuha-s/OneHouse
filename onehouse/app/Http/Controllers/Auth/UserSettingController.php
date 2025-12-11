<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserSettingController extends Controller
{


    // ログイン済ページで基本情報を変更する
    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
        ]);


        $user = auth()->user();
        $data = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }

        $user->update($data);


        return redirect()->route('user_setting')->with('status', 'ユーザー情報を変更しました');
    }

    public function destroy(string $id)
    {
        //
    }
}
