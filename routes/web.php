<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample',[\App\Http\Controllers\Sample\IndexController::class,'show']);
Route::get('/sample/{id}',[\App\Http\Controllers\Sample\IndexController::class,'showId']);

// シングルアクションコントローラの書き方　かっこ[]がない。関数名がない
Route::get('/tweet',\App\Http\Controllers\Tweet\IndexController::class)
->name('tweet.index');

Route::post('/tweet/create',\App\Http\Controllers\Tweet\CreateController::class)
->name('tweet.create');

Route::get('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\IndexController::class)
->name('tweet.update.index')->where('tweetId','[0-9]+');

Route::put('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\PutController::class)
->name('tweet.update.put')->where('tweetId','[0-9]+');

