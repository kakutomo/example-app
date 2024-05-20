<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        //
        // return 'Single Action!';
        // return view("tweet.index",['name' => 'laravel']);
        // return view("tweet.index")->with('name','caravel')
        // ->with('ttt','aaa');
        // return view("tweet.index",['name' => 'laravel'],['ttt' => 'naravel']);
        // $tweets = Tweet::all()->sortByDesc("created_at");

        // $tweets = Tweet::orderBy("created_at","desc")->get();
        // return view("tweet.index")
        // ->with('tweets',$tweets);

        // $tweetService = new TweetService();
        $tweets = $tweetService->getTweets();
        return view("tweet.index")
        ->with('tweets',$tweets);

     }
}
