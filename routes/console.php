<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('sample-command')->everyMinute()
->emailOutputTo('info@example.com');


Schedule::command('mail:send-daily-tweet-count-mail')->everyMinute();