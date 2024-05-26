<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;
use App\Services\TweetService;
// use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        //
        $tweetId = (int) $request->route("tweetId");
        // $tweet = Tweet::where('id',$tweetId)->first();
        // if( is_null($tweet) ) {
            // throw new NotFoundHttpException('存在しないつぶやきです');
        // }
        if(!$tweetService->checkOwnTweet($request->user()->id,$tweetId)) {
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id',$tweetId)->findOrFail($tweetId);
        return view('tweet.update')->with('tweet',$tweet);

    }

}
