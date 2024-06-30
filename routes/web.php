<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

if (app()->environment() == 'testing') {
    $identifier = '25ce5853-0341-4bc4-ad39-20f95b95f833';

    Route::prefix('.testing/'.$identifier)
        ->group(function () {
            Route::get('/sessionHandler', function () {
                return get_class(session()->getHandler());
            });
            Route::get('/put/{key}/{value}', function (string $key, string $value) {
                session()->remove($key);
                session()->put($key, $value);
                session()->save();
            });
            Route::get('/get/{key}', function (string $key) {
                return session()->get($key);
            });
            Route::get('/count', function () {
                return count(DB::select('SELECT * FROM `sessions`'));
            });
        });
}
