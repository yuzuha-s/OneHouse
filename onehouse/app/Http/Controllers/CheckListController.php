<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Phase;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    // public function indexPhase1()
    // {
    //     $checkLists = Checklist::with('profile')->get();
    //     return view('phase1', compact('checkLists'));
    // }
    // public function indexPhase5()
    // {
    //     return view('phase5');
    // }


    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile ?: $user->profile()->create([]);
        $profileId = $profile->id;

        $checkLists = Checklist::where('profile_id', $profileId)
            ->with('phase')
            ->get();

        return view('phase1', compact('checkLists'));
    }

    //リストを登録する
    public function store(Request $request)
    {
        if(!$request->profile_id) {
            return response()->json(['error' => 'profile_idが必要です'], 422);
        }

        $profileId = $request->profile_id;


        $validated = $request->validate([
            'list' => 'required|string|min:1|max:255',
        ]);
        $phase = Phase::firstOrCreate([
            'number' => 6,
            'list' => $validated['list'],
        ]);

        $checklist = Checklist::firstOrCreate([
            'profile_id' => $profileId,
            'phase_id'   => $phase->id,
        ], [
            'checked' => false,
        ]);

        return response()->json([
            'success' => true,
            'id' => $checklist->id,
            'checklist' => $checklist,
            'number' => $phase->number,
        ]);
    }


    public function show(string $id) {}

    public function edit(string $id) {}

    // チェックリストを更新する
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'list' => 'sometimes|string|min:1|max:255',
            'checked' => 'sometimes|boolean',
        ]);

        $checklist = Checklist::findOrFail($id);
        $phase = Phase::findOrFail($checklist->phase_id);

        if (array_key_exists('list', $validated)) {
            $phase->update([
                'list' => $validated['list'],
            ]);
        }
        if (array_key_exists('checked', $validated)) {
            $checklist->update([
                'checked' => $validated['checked'],
            ]);
        }

        return response()->json([
            'success' => true,
            'checklist' => $checklist->fresh(),
        ]);
    }

    // チェックリストを削除する
    public function destroy(string $id)
    {
        $checklist = Checklist::findOrFail($id);
        $phase = Phase::findOrFail($checklist->phase_id);

        $checklist->delete();
        $phase->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
