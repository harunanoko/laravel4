<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Tweet;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use App\Http\Requests\TweetsRequest;
use Validator;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //タイムライン表示のview渡すだけの処理
    {
        $tweets = Tweet::all();

        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  //新規投稿画面のviewだけ渡す処理
    {
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetsRequest $request) //追加処理(createの登録ボタン)
    {
        $tweet=new Tweet;
        //登録ユーザーからidを取得
        $tweet->user_id = Auth::user()->id;
        $tweet->title=$request->input('title');
        $tweet->tweet=$request->input('tweet');

        $tweet->save();

    //一覧表示画面にリダイレクト
    return redirect('/tweets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//詳細表示
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //変更フォーム(既存の値が入っている状態)
    {
        $tweet=Tweet::find($id);

        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TweetsRequest $request, $id) //変更処理(editの更新ボタン)
    {
        $tweet=Tweet::find($id);

        $tweet->user_id = Auth::user()->id;
        $tweet->title=$request->input('title');
        $tweet->tweet=$request->input('tweet');
    
        //DBに保存
        $tweet->save();
    
        return redirect('/tweet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //削除処理(showの削除ボタン)
    {
        $tweet=Tweet::find($id);

        $tweet->delete();
    
        return redirect('/tweet');
    }
}
