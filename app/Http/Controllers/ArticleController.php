<?php

namespace App\Http\Controllers;

use App\Http\Resources\Article as ResourcesArticle;
use App\Http\Resources\ArticleCollection;
use App\Models\Article;
//use App\Http\Resources\Resources\Article as ArticleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        return new ArticleCollection(Article::paginate(10));
    }
    public function show(Article $article)
    {
        return response()->json(new ResourcesArticle($article), 200);
    }

    public function store(Request $request)
    {

        //  $messages = [
        //    'required' => 'El campo :attribute es obligatorio.',
        //    'boyd.required' => 'El body no es válio.',
        // ];

        //  $request->validate([
        //     'title' => 'required|string|unique:articles|max:255',
        //     'body' => 'required',
        // ],$messages);

         $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:articles|max:255',
             'body' => 'required|string',
             'category_id' => 'required|exists:categories,id'
     ]);
     if ($validator->fails()) {
         return response()->json([
             'error' => 'data_validation_failed',
        "error_list" => $validator->errors()
         ], 400);
     }

        $article = Article::create($request->all());
        return response()->json($article, 201);
    }
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|unique:articles,title,'.$article->id.'|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $article->update($request->all());
        return response()->json($article, 200);
    }
    public function delete(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
