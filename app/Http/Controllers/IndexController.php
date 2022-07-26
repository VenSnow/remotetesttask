<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use App\Services\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $indexService;

    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }

    public function index(Request $request)
    {
        $lots = $this->indexService->getLotQuery($request)->paginate(15)->withPath("?" . $request->getQueryString());
        return view('index.index', compact('lots', 'request'));
    }

    public function show(Lot $lot)
    {
        return view('index.show', compact('lot'));
    }
}
