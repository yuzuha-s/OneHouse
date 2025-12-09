<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MakerController extends Controller
{
    public function index(Request $request)
    {
        $makers = Maker::with('features.category')->simplePaginate(2);
        return view('phase2', compact('makers'));
    }
    // 新規作成する
    public function create(Request $request)
    {
        $features = Feature::all();
        return view('phase2_edit', compact('features'));
    }

    // メーカー情報を新規登録する
    public function store(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'sales' => 'nullable|string|max:255',
            'option' => 'nullable|string',
            'star' => 'required|array',
            'star.*' => 'integer|min:1|max:5',
            'features' => 'array',
            'features.*' => 'integer|exists:features,id',
        ]);
        // starの最大値のみを取得
        $maxStar = max($validated['star']);

        $maker = Maker::create([
            'profile_id' => 1,
            'name' => $validated['name'],
            'sales' => $validated['sales'] ?? null,
            'option' => $validated['option'] ?? null,
            'star' => $maxStar,
        ]);

        if (!empty($validated['features'])) {
            $maker->features()->sync($request->features ?? []);
        }

        return redirect()->route('phase2')->with('success', $validated['name'] . 'の登録が完了しました');
    }

    public function show(string $id)
    {
        //
    }

    //  変更ページを表示する
    public function edit(string $id)
    {
        $maker = Maker::with('features.category')->findOrFail($id);
        $features = Feature::with('category')->get();
        return view('phase2_update', compact('maker', 'features'));
    }

    //  変更ページを更新する
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'sales' => 'nullable|string|max:255',
            'option' => 'nullable|string',
            'star' => 'required|array',
            'star.*' => 'integer|min:1|max:5',
            'features' => 'array',
            'features.*' => 'integer|exists:features,id',
        ]);


        $maker = Maker::findOrFail($id);
        $maxStar = max($validated['star']);

        $maker->update([
            'profile_id' => 1,
            'name' => $validated['name'],
            'sales' => $validated['sales'] ?? null,
            'option' => $validated['option'] ?? null,
            'star' => $maxStar,
        ]);

        if (!empty($validated['features'])) {
            $maker->features()->sync($request->features ?? []);
        }
        return redirect()->route('phase2')->with('success', $validated['name'] . 'を変更しました');
    }

    // メーカー情報を削除する
    public function destroy(string $id)
    {
        $maker = Maker::findOrFail($id);
        $makerName = $maker->name;
        $maker->features()->detach();
        $maker->delete();
        return redirect()->route('phase2')->with('success', "{$makerName}を削除しました");
    }
}
