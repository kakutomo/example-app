<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        //
        $tweetId = $request->Id();
        $tweet = Tweet::where('id',$tweetId)->findOrFail($tweetId);
        // dd($tweet);
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
            ->route("tweet.update.index",['tweetId'=>$tweetId])
            ->with('feedback.success','つぶやきを編集しました');
     }
}
