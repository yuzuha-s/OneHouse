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
        $landLogs = LandLog::with('profile')->get();

        $landLogs->transform(function ($log) {
            $log->tsubo = round($log->builable_area / 3.3);
            $log->updated_formatted = $log->updated_at->format('m/d(D)');
            return $log;
        });
        return view('phase4', compact('landLogs'));
    }


    public function create(Request $request)
    {
        //
    }

    // 登録データをそのまま表示する
    public function store(Request $request)
    {
        // 保存する
        Log::info('LandLogs store called', $request->all());

        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'landarea' => 'required|decimal:0,1',
            'far' => 'required|integer|min:1',
            'bcr' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1|max:3',
            'builable_area' => 'required|integer|min:1',
            'pricePerTsubo' => 'required|integer|min:1',

        ]);

        //    更新する

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


    public function show(string $id)
    {
        //
    }


    public function edit(string $id) {}


    public function update(LandLogRequest $request, string $id)
    {
        //
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
