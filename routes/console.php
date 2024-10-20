<?php

use App\Jobs\CallApi;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


//Schedule::job(new CallApi)->cron('0 * * * *');
Schedule::job(CallApi::class)->everyThirtySeconds();
