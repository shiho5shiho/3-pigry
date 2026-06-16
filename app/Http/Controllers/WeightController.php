<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeightRequest;
use App\Models\Weight;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // {{ -- 一覧表示用(全体)--}}
        $weights = auth()->user()->weights()
            ->orderBy('recorded_date', 'desc') // ここで体重データを取得する処理を追加
            ->get();                                                  

        // {{ -- グラフ表(同日複数の場合は最新1件のみ表示) -- }}
        $graphData = auth()->user()->weights()
            ->orderBy('recorded_date')
            ->get()
            ->groupBy('recorded_date')
            ->map(fn($group) => $group->last());
        
        return view('weights.index', compact('weights', 'graphData'));
    }

    //    体重を登録
    public function store(WeightRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Weight::create($validated);

        return redirect()->route('weights.index')->with('success', '体重が正常に記録されました。');
    }

//    体重を削除
    public function destroy(Weight $weight)
    {
        $this->authorize('delete', $weight);

        $weight->delete();

        return redirect()->route('weights.index')->with('success', '体重が正常に削除されました。');
    }
}
