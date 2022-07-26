<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index()
    {
        return Lot::with('categories')->latest()->paginate(15)->toJson();
    }

    public function show($id)
    {
        return Lot::with('categories')->findOrFail($id)->toJson();
    }
}
