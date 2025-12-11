<?php
#TODO:LandLogの命名を変更する

namespace App\Http\Controllers;

use App\Http\Requests\LandLogRequest;
use App\Models\LandLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandLogController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile ?: $user->profile()->create([]);
        $profileId = $profile->id;

        $landLogs = LandLog::where('profile_id', $profileId)->get();

        $landLogs->transform(function ($log) {
            $log->tsubo = round($log->builable_area / 3.3);
            $log->updated_formatted = $log->updated_at->format('m/d(D)');
            return $log;
        });
        return view('phase4', compact('landLogs'));
    }


    // 登録データをそのまま表示する
    public function store(Request $request)
    {

        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'landarea' => 'required|decimal:0,1',
            'far' => 'required|integer|min:1',
            'bcr' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1|max:3',
            'builable_area' => 'required|integer|min:1',
            'pricePerTsubo' => 'required|integer|min:1',

        ]);

        //  登録データを更新する
        $profileId = auth()->user()->profile->id;
        if ($request->id) {
            $landLog = LandLog::findOrFail($request->id);
            $landLog->update($validated);
        } else {
            LandLog::create([
                'profile_id' => $profileId,
                'address' => $validated['address'],
                'landarea' => $validated['landarea'],
                'far' => $validated['far'],
                'bcr' => $validated['bcr'],
                'floor' => $validated['floor'],
                'builable_area'  => $validated['builable_area'],
                'pricePerTsubo' =>  $validated['pricePerTsubo'],
            ]);
        }


        return redirect()->route('phase4')->with('success', '登録が完了しました');
    }

    // 土地情報を削除する
    public function destroy(string $id)
    {
        $landLog = LandLog::findOrFail($id);
        $landAddress = $landLog->address;
        $landLog->delete();

        return redirect()->route('phase4')->with('success', "{$landAddress}を削除しました");
    }
}
