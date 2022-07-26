<?php


namespace App\Services;


use App\Models\Lot;
use Illuminate\Http\Request;

class IndexService
{

    public function getLotQuery(Request $request)
    {
        $lotQuery = Lot::query();
        if($request->filled('category')) {
            $lotQuery->whereHas('categories', function($q) use($request) {
                $q->whereIn('id', array_values($request->category));
            })->get();
        }
        return $lotQuery->with('categories')->latest();
    }

}
