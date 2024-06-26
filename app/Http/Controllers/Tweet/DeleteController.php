<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request,TweetService $tweetService)
    // {
    //     //
    //     $tweetId = (int) $request->route('tweetId');
    //     if(!$tweetService->checkOwnTweet($request->user()->id,$tweetId)){
    //         throw new AccessDeniedHttpException();
    //     }
    //     $tweet = Tweet::where('id', $tweetId)->firstOrFail();
    //     $tweet->delete();
    //     return redirect()->route("tweet.index")->with('feedback.success','つぶやきを削除しました');
    //     // dd($request);
    // }
    public function __invoke(Request $request,TweetService $tweetService)
    {
        //
        // dd($request->all());
        $tweetId = (int) $request->route('tweetId');
        if( !$tweetService->checkOwnTweet($request->user()->id,$tweetId)){
            throw new AccessDeniedException();
        }
        // $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        // $tweet->delete();
        $tweetService->deleteTweet($tweetId);
        return redirect()->route("tweet.index")->with('feedback.success','つぶやきを削除しました');
        // dd($request);
    }
}
