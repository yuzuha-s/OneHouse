<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('phase2_edit', compact('features'));
    }


    public function store(Request $request)
    {
        $validated =  $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'tag' => 'required|string|max:100',
        ]);

        Feature::create($validated);

        return redirect()->route('phase2')->with('success', '登録が完了しました');
    }
}
