<?php

namespace App\Http\Controllers;

use App\Models\ChecklistCustom;
use App\Models\ChecklistTemplate;
use App\Models\CustomList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $customLists = ChecklistCustom::where('profile_id', $profileId)
            ->with('customList')
            ->get();

        return view('phase1', compact('checkLists', 'customLists'));
    }

    //リストを登録する
    public function store(Request $request)
    {
        $validated = $request->validate([
            'list' => 'required|string|min:1|max:255',
        ]);

        $profileId = $request->input('profile_id');
        Log::info('profileId', ['id' => $profileId]);

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
        ]);
    }

    // チェックリストを更新する
    public function update(Request $request, string $id)
    {
        // それぞれのバリデーション制御
        $rules = [
            'type' => 'required|in:template,custom',
            'checked' => 'sometimes|boolean',
        ];
        if ($request->type === 'custom') {
            $rules['list'] = 'sometimes|string|min:1|max:255';
        }

        $request->validate($rules);

        // ChecklistTemplate-TemplateList：checked変更のみ変更
        if ($request->type === 'template') {
            $checklistTemplate = ChecklistTemplate::findOrFail($id);

            if ($request->has('checked')) {
                $checklistTemplate->update([
                    'checked' => $request->checked,
                ]);
            }
            return response()->json([
                'success' => true,
                'type' => 'template',
            ]);
        }
        // ChecklistCustom-CustomList：入力変更・checked変更
        if ($request->type === 'custom') {
            $customList = CustomList::with('checklistCustom')->findOrFail($id);

            if ($request->has('checked')) {
                $customList->checklistCustom()->update([
                    'checked' => $request->checked,
                ]);
            }
            if ($request->filled('list')) {
                $customList->update([
                    'list' => $request->list,
                ]);
            }
            return response()->json([
                'success' => true,
                'type' => 'custom',
            ]);
        }
    }

    // チェックリストを削除する
    public function destroy(string $id)
    {

        DB::transaction(function () use ($id) {
            $customList = CustomList::findOrFail($id);

            $customList->checklistCustom()->delete();
            $customList->delete();
        });


        return response()->json([
            'success' => true,
        ]);
    }
}
