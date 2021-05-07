<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Like;
use App\User;
use App\Tweet;
use Illuminate\Http\Request;

class LikesController extends Controller
{
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Like::create([
            'tweet_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect('/tweets');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = Like::where('tweet_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect('/tweets');
    }
}
