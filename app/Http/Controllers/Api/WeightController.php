<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;
use App\Http\Resources\WeightResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WeightController extends Controller
{
    /**
     * 体重一覧をJSON形式で取得
     */
    public function index(): AnonymousResourceCollection

    {
        $weights = Weight::with('user')
            ->orderBy('recorded_date', 'desc')
            ->get();

        return WeightResource::collection($weights);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Weight $weight)
    {
        $weight->load('user');

        return new WeightResource($weight);
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weight $weight)
    {
        $this->authorize('delete', $weight);
        $weight->delete();
        return response()->noContent(); // 204 No Content//
    }
}
