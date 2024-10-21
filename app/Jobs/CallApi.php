<?php

namespace App\Jobs;

use Exception;
use App\Models\Values;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CallApi implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->handle();
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        $api=Http::timeout(20)->acceptJson()->get('https://api.chucknorris.io/jokes/random');

        $api->json();

        $value = $api['value'];

        $val = new Values();

        $val->values = $value;

        $val->setConnection('mysql')->save();

        //non so come passare i dati direttamente al controller credo sia meglio inviare i dati al DB


    }


}
