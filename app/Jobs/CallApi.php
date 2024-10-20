<?php

namespace App\Jobs;

use Exception;
use App\Models\Values;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CallApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
       // $this->handle();
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        $api=Http::timeout(20)->acceptJson()->get('https://api.chucknorris.io/jokes/random');

        $api->json();

        $val = $api['value'];

        $values = new Values();

        $values->values = $val;

        $values->setConnection('mysql')->save();


        //non so come passare i dati direttamente al controller credo sia meglio inviare i dati al DB


    }


}
