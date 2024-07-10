<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return response()->json([
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    public function show(Category $category)
    {
        $articles = $category->articles()->with('category')->get();
        $subCategoryArticles = $this->getSubCategoryArticles($category);
        $allArticles = $articles->merge($subCategoryArticles);
        // return response()->json(['category' => $category, 'articles' => $allArticles]);
        return response()->json([
            'category' => new CategoryResource($category),
            'articles' => ArticleResource::collection($category->articles),
        ]);
    }

    private function getSubCategoryArticles($category)
    {
        $articles = collect();
        foreach ($category->children as $subCategory) {
            $articles = $articles->merge($subCategory->articles);
            $articles = $articles->merge($this->getSubCategoryArticles($subCategory));
        }
        return $articles;
    }
}
