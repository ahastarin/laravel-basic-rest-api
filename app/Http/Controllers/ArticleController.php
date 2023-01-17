<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::get();
        return new ArticleCollection($article);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articles = Article::create($this->articleValidation($request));

        return $articles;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
// 
        // return response([
        //     "data" =>  new ArticleResource($article),
        //     "status" => "success"
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        Article::where('slug', $article->slug)
            ->update($this->articleValidation($request));

        return response([
            "data" => $this->articleValidation($request),
            "status" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function articleValidation(Request $request)
    {
        $validatedData = $request->validate([
            "title" => "required|min:5|max:25",
            "body" => "required",
            "subject_id" => "required"
        ]);

        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = \Str::slug($request['title']);

        return $validatedData;
    }
}
