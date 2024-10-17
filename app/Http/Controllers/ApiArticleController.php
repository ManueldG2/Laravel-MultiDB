<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

//https://dev.to/rohitsondigala/creating-a-restful-api-in-laravel-a-comprehensive-guide-27oi esempio api
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
        // curl -X POST http://localhost:8000/api/articles  -H "Content-Type: application/json" -d "[{\"name\":\"test1\",\"price\":5,\"insert\":\"2024-10-16 20:00:00\",\"taking\":null,\"amount\":3,\"position\":\"a2\",\"user\":\"mdg@email.it\"}]" > out.html

        $article = new Article();

        $article->setConnection('mysql');

        $req = $request->input();

        $article->name = $req['name'];
        $article->price = $req['price'];
        $article->insert = $req['insert'];
        $article->taking = $req['taking'];
        $article->amount = $req['amount'];
        $article->position = $req['position'];
        //$article->user = $req['user'];
        $article->user = (auth('sanctum')->user()->email); //potrei creare un campo json sul database e inserire la lista degli utenti che hanno avuto accesso al'articolo

        $art = $article->save();

        return response()->json("{'data':$art,status:201}",201);
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
     * curl -X PUT  http://localhost:8000/api/articles/15 -H "Authorization: Bearer j2TI64dA1Iku8GnEplExvfxV3eCvHXkc3CazFFHee549d6f1"  -H "Content-Type: application/json" -d "{\"name\":\"test1\",\"price\":5,\"insert\":\"2024-10-16 20:00:00\",\"taking\":null,\"amount\":3,\"position\":\"a2\",\"user\":\"mdg@email.it\"}"
     */
    public function update(Request $request, Article $article)
    {
        $article = new Article();

        $article->setConnection('mysql');

        $req = $request->input();

        $article->name = $req['name'];
        $article->price = $req['price'];
        $article->insert = $req['insert'];
        $article->taking = $req['taking'];
        $article->amount = $req['amount'];
        $article->position = $req['position'];
        $article->user = (auth('sanctum')->user()->email);
        $art = $article->save();

        return response()->json("{'data':$art,status:200}",200);

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
