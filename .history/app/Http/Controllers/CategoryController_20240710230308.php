<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return response()->json($categories);
    }

    public function show(Category $category)
    {
        $articles = $category->articles()->with('category')->get();
        $subCategoryArticles = $this->getSubCategoryArticles($category);
        $allArticles = $articles->merge($subCategoryArticles);
        return response()->json(['category' => $category, 'articles' => $allArticles]);
    }
}
