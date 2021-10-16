<?php

namespace App\Http\Controllers;

use App\Http\Resources\Article as ResourcesArticle;
use App\Http\Resources\ArticleCollection;
use App\Models\Article;
//use App\Http\Resources\Resources\Article as ArticleResource;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        return new ArticleCollection(Article::paginate(15));
    }
    public function show(Article $article)
    {
        return new ResourcesArticle($article);
    }
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($article, 200);
    }
    public function delete(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
