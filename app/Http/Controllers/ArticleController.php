<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticaleRequest;
use App\Http\Requests\UpdateArticaleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function store(ArticaleRequest $article)
    {
        $article = Article::create([
            'title' => $article->title,
            'content' => $article->content,
            'category_id' => $article->category_id,
            'hashtags' => $article->hashtags ?? null,
        ]);
        return response()->json($article, 201);
    }

    public function update(UpdateArticaleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'hashtags' => $request->hashtags ?? null,
        ]);
        return response()->json($article);
    }
}
