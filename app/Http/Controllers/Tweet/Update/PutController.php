<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request,TweetService $tweetService)
    {
        //
        if(!$tweetService->checkOwnTweet($request->user()->id,$request->id())) {
            throw new AccessDeniedHttpException();
        }
        $tweetId = $request->Id();
        $tweet = Tweet::where('id',$tweetId)->findOrFail($tweetId);
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
            ->route("tweet.update.index",['tweetId'=>$tweetId])
            ->with('feedback.success','つぶやきを編集しました');
     }
}
