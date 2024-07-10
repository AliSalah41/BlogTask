<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticaleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function store(ArticaleRequest $article)
    {
        // dd(Auth::user());
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required',
        //     'category_id' => 'required|exists:categories,id',
        //     'hashtags' => 'nullable|array',
        // ]);
        // \Log::info('Authorization attempt:', ['user_id' => $article->user()->id]);

        // $this->authorize('create', Article::class);

        $article = Article::create([
            'title' => $article->title,
            'content' => $article->,
            'category_id' => 'required|exists:categories,id',
            'hashtags' => 'nullable|array',
        ]);
        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required',
            'category_id' => 'sometimes|required|exists:categories,id',
            'hashtags' => 'nullable|array',
        ]);

        $article->update($validated);
        return response()->json($article);
    }
}
