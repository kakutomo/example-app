<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        // return 'Single Action!';
        // return view("tweet.index",['name' => 'laravel']);
        // return view("tweet.index")->with('name','caravel')
        // ->with('ttt','aaa');
        // return view("tweet.index",['name' => 'laravel'],['ttt' => 'naravel']);
        // $tweets = Tweet::all()->sortByDesc("created_at");
        $tweets = Tweet::orderBy("created_at","desc")->get();
        // dd($tweets);
        return view("tweet.index")
        ->with('tweets',$tweets);
     }
}
