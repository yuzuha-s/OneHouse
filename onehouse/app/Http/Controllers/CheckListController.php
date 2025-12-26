<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistCustom;
use App\Models\ChecklistTemplate;
use App\Models\CustomList;
use App\Models\Phase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckListController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile ?: $user->profile()->create([]);
        $profileId = $profile->id;

        $checkLists = ChecklistTemplate::where('profile_id', $profileId)
            ->with('templateList')
            ->get();

        return view('phase1', compact('checkLists'));
    }

    //リストを登録する
    public function store(Request $request)
    {
        if (!$request->profile_id) {
            return response()->json(['error' => 'profile_idが必要です'], 422);
        }

        $profileId = $request->profile_id;


        $validated = $request->validate([
            'list' => 'required|string|min:1|max:255',
        ]);
        $customList = CustomList::firstOrCreate([
            'phase' => 6,
            'list' => $validated['list'],
        ]);

        $checklistCustom = ChecklistCustom::firstOrCreate([
            'profile_id' => $profileId,
            'custom_list_id'   => $customList->id,
        ], [
            'checked' => false,
        ]);

        return response()->json([
            'success' => true,
            'id' => $checklistCustom->id,
            'checklist' => $checklistCustom,
            'phase' => $customList->phase,
        ]);
    }

# TODO:ChecklistCustom-CustomListでは　入力変更・checked変更
# TODO:ChecklistTemplate-TemplateListでは　checked変更のみ変更
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
        DB::transaction(function () use ($id) {
            $checklist = ChecklistCustom::findOrFail($id);
            $customList = CustomList::findOrFail($checklist->customList_id);

            $customList->delete();
            $checklist->delete();
        });


        return response()->json([
            'success' => true,
        ]);
    }
}
