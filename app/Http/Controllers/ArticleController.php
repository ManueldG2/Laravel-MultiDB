<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Jobs\CallApi;
use App\Models\Values;
use App\Models\Article;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use function Laravel\Prompts\form;
use function Laravel\Prompts\alert;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = new Article();

        $art = $article->allI();

        return view('article.index',compact('art'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('article.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /*
          prodotti prelevati/acquistati tipo quantità ora (insererimento, uscita)

            2 server in contemporanea e interroga un terzo db per altri dati espone servizi web come API usando Oauth2

            dati statistici grafici chart.js andamento delle vendite e di tipo commerciale quanti prodotti nel mobiletto e quale è stato acquistato in che orario (data - giorno della settimana )
         */


            $validated = $request->validate([
                'name' => 'required|unique:articles|between:2,40',
                'amount' => 'min:1',
                'position' => 'required|unique:articles',
                'price' => 'numeric',
                'insert' => 'date'
            ]);

        $article = new Article();

        $article->name =$request->input('name');
        $article->price = $request->input('price');

        $article->insert = $request->input('insert') ?? Carbon::now();

        $article->amount = $request->input('amount');

        $article->position = $request->input('position');
        $article->user = Auth::user()->email; // come funzionalità da aggiungere potrei creare una lista d'accessi con gli utenti che hanno operato sull'articolo
        // dump( json_encode( Auth::user()) ); un'idea potrebbe essere di creare un Json di accessi
        $article->save();

        return redirect()->route('article.index');
        //ritorna a index aggiungere campi

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view("article.show",[ 'article'=> $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {

        return view("article.update",[ 'article'=> $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article){

        $validated = $request->validate([
            'name' => 'required|unique:articles|between:2,40',
            'amount' => 'numeric|min:1',
            'position' => 'required|unique:articles',
            'price' => 'numeric',
            'insert' => 'date',

        ]);

        $article->name =$request->input('name');

        $article->price = $request->input('price');

        $article->insert = $request->input('insert') ?? Carbon::now(); // se riceve null inserisce la data attuale di norma c'è la validazione in blade

        $article->taking = $request->input('taking') ; // metto la data al momento del ritiro prodotto - Carbon::now();

        $article->amount = $request->input('amount') ?? 1;

        $article->position = $request->input('position');

        $article->user = Auth::user()->email;

        $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->destroy($article->id);
        alert("cancellato");
    }

    public function showChart()
    {

        //grafico numero di articoli per settimana

        //altro grafico uscite/entrate???

          /*
        $start = Carbon::parse(User::min("created_at"));

        $end = Carbon::now();
        */

        $article = new Article();

        $article->setConnection('mysql');

        $start = Carbon::parse( $article::min('created_at') );
        $end = Carbon::now();

        $period = CarbonPeriod::create($start, "1 week", $end);

        $articlePerMonth = collect($period)->map(function ($date) {

            $endDate = $date->copy()->endOfWeek();

            $article = new Article();

            $article->setConnection('mysql');

            $dates = ($article::where("created_at","<=",$endDate)->get());

            return [
                "count" => $article::where("created_at", "<=", $endDate)->count(),
                "month" => $endDate
            ];
        });

        $data = $articlePerMonth->pluck("count")->toArray();
        $labels = $articlePerMonth->pluck("month")->toArray();

        $chart = Chartjs::build()
            ->name("Prodotti ")
            ->type("line")
            ->size(["width" => 600, "height" => 300])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Prodotti inseriti",
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "data" => $data = $data
                ]
            ])
            ->options([
                'scales' => [
                    'x' => [
                        'type' => 'time',
                        'time' => [
                            'unit' => 'week'
                        ],
                        'min' => $start->format("Y-m-d"),
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Inserimenti settimanali'
                    ]
                ]
            ]);

        return view("user.chart", compact("chart"));

    }
}
