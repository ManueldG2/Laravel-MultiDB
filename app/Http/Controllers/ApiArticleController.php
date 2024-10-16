<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = new Article();

        $art = $article->allI();

        return response($art,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();
        dump($request->all()[0]['name']);
        // curl -X POST http://localhost:8000/api/articles  -H "Content-Type: application/json" -d "[{\"name\":\"test1\",\"price\":5,\"insert\":\"2024-10-16 20:00:00\",\"taking\":null,\"amount\":3,\"position\":\"a2\",\"user\":\"mdg@email.it\"}]" > out.html

        $article->setConnection('mysql');

        $art = $article::create($request->all());


        return response($art,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return response($article,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->name =$request->input('name');
        $article->price = $request->input('price');

        $article->insert = $request->input('insert') ?? Carbon::now();

        $article->amount = $request->input('amount');

        $article->position = $request->input('position');
        //recuperare user dal token
        $article->save();

        return response('salvato',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if($article->delete())
            return response()->json(["data"=>"deleted","status"=>200],200);
        else
            return response()->json(["data"=>"error","status"=>204],204);
    }
}
