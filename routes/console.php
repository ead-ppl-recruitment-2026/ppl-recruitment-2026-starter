<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about', function (): void {
    $this->comment('EAD Laboratory campus room reservation starter.');
})->purpose('Display application information');
