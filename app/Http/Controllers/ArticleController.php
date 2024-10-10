<?php

namespace App\Http\Controllers;

use App\Jobs\CallApi;
use App\Models\Values;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $article = new Article();

        /*$article->name = "tec";
        $article->price = 0.9;

        $article->save();*/

        $article = new Article();


        $art = $article->allI();

        $values = new Values();

        $val = $values->setConnection('mysql')->allI();

        dump($val);

        CallApi::dispatch();

        return view('welcome',compact('art','val'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article)
    {
        //
    }
}
