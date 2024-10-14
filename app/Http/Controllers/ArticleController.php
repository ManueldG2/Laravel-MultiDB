<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Jobs\CallApi;
use App\Models\Values;
use App\Models\Article;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use function Laravel\Prompts\form;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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


        return view('article.index');
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
        $article = new Article();

        $article->name =$request->input('name');
        $article->price = $request->input('price');

        $article->insert = $request->input('insert') ?? Carbon::now();
        //$article->taking = Carbon::now();
        $article->amount = 0;

        $article->position = $request->input('position');

        $article->save();
        dump($request);
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
    public function update(Request $request, Article $article)
    {


        $article->name =$request->input('name');
        $article->price = $request->input('price');

        $article->insert = $request->input('insert') /*?? Carbon::now()*/;
        $article->taking = $request->input('taking') ?? Carbon::now();
        $article->amount = $request->input('amount') ?? 0;

        $article->position = $request->input('position');

        $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function showChart()
    {

        $start = Carbon::parse(User::min("created_at"));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, "1 month", $end);

        $usersPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                "count" => User::where("created_at", "<=", $endDate)->count(),
                "month" => $endDate->format("Y-m-d")
            ];
        });

        $data = $usersPerMonth->pluck("count")->toArray();
        $labels = $usersPerMonth->pluck("month")->toArray();

        $labels[] = "2024-10-15";
        $labels[] = "2024-10-10";

        $data =   $data + [1=>5,2=>2]  ;


        dump($data,$labels);

        $chart = Chartjs::build()
            ->name("UserRegistrationsChart")
            ->type("bar")
            ->size(["width" => 400, "height" => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "User Registrations",
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
                            'unit' => 'month'
                        ],
                        'min' => $start->format("Y-m-d"),
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Monthly User Registrations'
                    ]
                ]
            ]);

        return view("user.chart", compact("chart"));

    }
}
