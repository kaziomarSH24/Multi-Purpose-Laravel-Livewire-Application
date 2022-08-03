<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

/** create this file and added this to composer.json file and then run command:- composer dump-autoload*/

// create for settings
function setting($key)
{

    $setting = Cache::rememberForever('setting',function (){
        return Setting::first();
    });
    return $setting->{$key};


//   return Setting::first()->{$key}; //In this way executing query multiple times. "we show this laravel debugar" --- composer require barryvdh/laravel-debugbar --dev
    
}
