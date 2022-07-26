<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::latest()->paginate(10)->toJson();
    }

    public function lotIndexByCategory($id)
    {
        $category = Category::findOrFail($id);
        return $category->lots()->paginate(15)->toJson();
    }
}
